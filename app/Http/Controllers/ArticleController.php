<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Models\Article;
use App\Models\ArticleHistoryVersion;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Laravel\Octane\Exceptions\DdException;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Article::class);
    }


    public function index()
    {
        $articles = Article::query()->leftJoin(User::new()->getTable(), 'users.id', '=', 'articles.user_id')
            ->select([
                'articles.id',
                'users.name',
                'articles.likes',
                'articles.title',
                'articles.collects',
                'articles.views',
                'articles.comments',
                'articles.status',
                'articles.user_id',
                'articles.created_at',
            ])->paginate(10);


        return Inertia::render('Article/Index', compact('articles'));
    }

    public function create(Request $request)
    {
        return Inertia::render('Article/Create');
    }

    public function show(Article $article)
    {
        return Inertia::render('Article/Show', compact('article'));
    }

    /**
     * 更新文章
     * @param  Request  $request
     * @param  Article  $article
     * @return RedirectResponse
     * @throws DdException
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'user_id' => ['required', Rule::exists(User::new()->getTable(),'id')],
//            'categories_id' => ['required'],
//            'comments' => ['required'],
            'title' => ['required', 'string', 'between:5,60'],
            'subtitle' => ['required', 'string', 'between:5,128'],
            'body' => ['required', 'string'],
            'status' => ['required']
        ]);

        $articleData = $request->only([
            'user_id',
            'title',
            'status',
            'subtitle',
            'body'
        ]);

        // 处理图片
        $partner = '!\[(.*)\]\((.+)\)!';  // 匹配 markdown 中的图片地址
        preg_match_all($partner, $article->body, $match);

        if ($match !== null) {

            $delImages = [];  // 删除的图片
            $addImages = []; // 添加的图片

            $oldImages = $this->getBaseNameImages($match[2]);
            $newBody = $request->input('body');
            preg_match_all($partner, $newBody, $match);

            if ($match === null) {
                // 删除老的图片
                Storage::disk('local')->delete($oldImages);

            } else {

                $newImages = $this->getBaseNameImages($match[2]);

                $addImages = array_diff($newImages, $oldImages);
                $delImages = array_diff($oldImages, $newImages);

                $this->deleteImages(array_values($delImages));
                foreach ($addImages as $path) {
//                    $baseName = basename($path);
                    $pattern = '/temp\/'.$path.'/i';
                    $replacement = $path;
                    // 把文件挪到  images 下
                    Storage::disk('local')->move('public/images/temp/'.$path, 'public/images/'.$path);
                    $newBody = preg_replace($pattern, $replacement, $newBody);
                    $articleData['body'] = $newBody;
                }
            }
        }

        // 判断是否是保存历史版本
        if($request->input('version') == 1){
            $this->createArticleHistoryVersion($articleData);
            // TODO
//            dd($request->all());
        }

        $article->update($articleData);
        return back();
    }

    /**
     * 保存历史版本
     * @param $articleData
     * @return ArticleHistoryVersion
     */
    public function createArticleHistoryVersion($articleData)
    {
         $articleHistoryVersion = new ArticleHistoryVersion();
         $articleHistoryVersion->fill([]);
         $articleHistoryVersion->save();
         return $articleHistoryVersion;
    }

    /**
     * 删除图片
     * @param $delImages
     */
    public function deleteImages($delImages): void
    {
        $storage = Storage::disk('local');
        foreach ($delImages as $delImage) {
            $storage->delete('public/images/'.$delImage);
        }
    }

    /**
     * 移动图片
     * @param $addImages
     */
    public function moveImages($addImages): void
    {
        $storage = Storage::disk('local');
        foreach ($addImages as $addImage) {
            $storage->move('public/images/temp/'.$addImage, 'public/images/'.$addImage);
        }
    }


    /**
     * @param  array  $images
     * @return array|string
     */
    public function getBaseNameImages(array $images): array|string
    {
        $result = [];
        if (empty($images)) {
            return $result;
        }
        foreach ($images as $image) {
            $result[] = basename($image);
        }
        return $result;
    }


    public function store(CreateArticleRequest $request)
    {

        $article = new Article();

        $body = $request->input('body');
        $partner = '!\[(.*)\]\((.+)\)!';  // 匹配 markdown 中的图片地址
        preg_match_all($partner, $body, $match);

        if ($match !== null) {
            foreach ($match[2] as $path) {
                $baseName = basename($path);
                $pattern = '/temp\/'.$baseName.'/i';
                $replacement = $baseName;
                // 把文件挪到  images 下
                Storage::disk('local')->move('public/images/temp/'.$baseName, 'public/images/'.$baseName);
                $body = preg_replace($pattern, $replacement, $body);
            }
        }

        $request['body'] = $body;
        $article->fill($request->only([
            'user_id',
            'title',
            'subtitle',
            'body',
            'categories_id',
            'comments',
            'status'
        ]));



        $article->save();
        return Redirect::route('articles.show', $article);
    }


    /**
     * 编辑文章
     * @param  Article  $article
     * @return \Inertia\Response
     */
    public function edit(Article $article)
    {
        return Inertia::render('Article/Edit', compact('article'));
    }


    /**
     * 删除文章
     * @param  Article  $article
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Article $article): RedirectResponse
    {
        try {

            //删除的文章图片放入零食存储区


            Article::query()->where('id', $article->id)->delete();

        } catch (Exception $exception) {
            throw new $exception;
        }

        return back();
    }


}
