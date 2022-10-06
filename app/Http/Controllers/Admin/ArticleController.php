<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\CreateArticleRequest;
use App\Http\Requests\Article\EditArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $title = 'Article list';

        $articles = Article::query()->paginate(3);

        return view('admin.articles.index', compact('title', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateArticleRequest $request)
    {
        $request->validated();

        $data = $request->all();

        $data['image'] = Article::uploadImage($request);

        Article::query()->create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $title = 'Edit article';
        $article = Article::query()->findOrFail($id);

        if ($article) {
            return view('admin.articles.edit', compact('title', 'article'));
        }
        abort(404, 'Not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditArticleRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditArticleRequest $request, $id)
    {
        $request->validated();

        $article = Article::query()->findOrFail($id);
        $data = $request->all();

        $image = Article::uploadImage($request, $article->image);

        if ($image) {
            $data['image'] = $image;
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Save');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $article = Article::query()->find($id);
        Storage::delete($article->image);
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Article has been deleted');
    }
}
