<?php

namespace App\Http\Controllers;

use App\Models\Article;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Article::class);
    }


    public function index()
    {

    }


}
