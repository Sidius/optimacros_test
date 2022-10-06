<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $article_nav = true;
        $articles = Article::query()->orderBy('created_at', 'desc')->paginate(10);

        return view('articles.index', compact('articles', 'article_nav'));
    }

    public function single($id)
    {
        $article_nav = true;
        $article = Article::query()->findOrFail($id);

        return view('articles.single', compact('article', 'article_nav'));
    }
}
