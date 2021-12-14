<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

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
            ])->paginate(2);


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
                Storage::disk('local')->move('public/images/temp/'.$baseName,'public/images/'.$baseName);
                $body = preg_replace($pattern, $replacement, $body);
            }
        }

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


}
