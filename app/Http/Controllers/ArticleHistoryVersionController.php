<?php

namespace App\Http\Controllers;

use App\Models\ArticleHistoryVersion;
use Inertia\Inertia;

class ArticleHistoryVersionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ArticleHistoryVersion::class);
    }

    public function show(ArticleHistoryVersion $articleHistoryVersion)
    {
        $articleHistoryVersionsList = ArticleHistoryVersion::query()->where('article_id', $articleHistoryVersion->article_id)->paginate(2);

        return Inertia::render('ArticleHistoryVersion/Show', compact('articleHistoryVersion', 'articleHistoryVersionsList'));
    }




}
