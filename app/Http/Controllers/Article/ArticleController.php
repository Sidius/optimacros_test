<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::query()->orderBy('created_at', 'desc')->paginate(10);

        return view('articles.index', compact('articles'));
    }

    public function single($id)
    {
        $article = Article::query()->findOrFail($id);

        return view('articles.single', compact('article'));
    }
}
