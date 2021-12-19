<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleHistoryVersionController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(Article::class);
    }


    public function create()
    {

    }
}
