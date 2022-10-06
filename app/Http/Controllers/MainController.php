<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $articles = Article::query()->orderBy('created_at', 'desc')->limit(6)->get();

        return view('index', compact('articles'));
    }
}
