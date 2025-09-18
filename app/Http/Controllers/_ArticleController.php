<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();
        return view('article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }
    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }
    public function store(StoreArticleRequest $request, Article $article)
    {
        Article::create($request->validated());

        return redirect()
            ->route('articles.index');
    }
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('article.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->validated());

        return redirect()
            ->route('articles.index')
            ->with('success', 'Обновление выполнено');
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        if ($article) {
            $article->delete();
        }
        return redirect()
            ->route('articles.index')
            ->with('success', 'Удаление выполнено');
    }

}
