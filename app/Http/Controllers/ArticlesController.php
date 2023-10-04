<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Article::all();
        $createLink = route('admin.articles.create');

        return view('manage', [
            'items' => $items,
            'header' => 'Manage Articles',
            'createLink' => $createLink
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('article.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required|string',
            'image' => 'nullable|url',
            'category_id' => 'nullable|string',
            'tags' => 'nullable|array'
        ]);

        $article = Article::create($validated);

        if ($article && isset($validated['tags'])) {
            $article->tags()->attach($validated['tags']);
        }

        return redirect(route('admin.articles.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $tags_selected = $article->tags();

        return view('article.edit', [
            'article' => $article,
            'categories' => $categories,
            'tags' => $tags,
            'tags_selected' => $tags_selected
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required|string',
            'image' => 'nullable|url',
            'category_id' => 'nullable|string',
            'tags' => 'nullable|array'
        ]);

        // return dd($article->tags);

        $article->update($validated);

        if (isset($validated['tags'])) {
            $article->tags()->sync($validated['tags']);
        } else {
            $article->tags()->detach();
        }

        return redirect(route('admin.articles.show', $article->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('admin.articles.index'));
    }
}
