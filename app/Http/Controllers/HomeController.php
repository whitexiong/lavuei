<?php

namespace App\Http\Controllers;

use App\Enum\ArticleStatusEnum;
use App\Models\Article;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::query()->whereIn('status', [ArticleStatusEnum::ENABLE->value])->paginate(2);
        return Inertia::render('Home/Index', compact('articles'));
    }

    public function login()
    {
        return Inertia::render('Home/Login');
    }

    public function articleDetail(Article $article)
    {
        return Inertia::render('Home/ArticleDetail',compact('article'));
    }

    public function register()
    {
        return Inertia::render('Home/Register');

    }

}
