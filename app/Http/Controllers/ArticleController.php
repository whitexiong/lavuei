<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Article::class);
    }


    public function index()
    {
        $articles = Article::query()->leftJoin(User::new()->getTable(), 'users.id', '=','articles.user_id')
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
