<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('categories', 'tags', 'author')
            ->when(request()->category_id, function ($query) {
                $query->whereRelation('categories', 'id', request()->category_id);
            })
            ->when(request()->tag_id, function ($query) {
                $query->whereRelation('tags', 'id', request()->tag_id);
            })
            ->when(request()->query, function ($query) {
                $query->where('title', 'like', request()->query);
            })
            ->latest()
            ->paginate();
        $all_categories = Category::all();
        $all_tags = Tag::all();

        return view('articles.index', compact('articles', 'all_categories', 'all_tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $article = Auth::user()
            ->articles()
            ->create($request->validated());

        if (isset($request->categories)) {
            $article->categories()->attach($request->categories);
        }

        if ($request->tags !== '') {
            $tags = explode(',', $request->tags);
            foreach ($tags as $tag_name) {
                // FIXME: XSS vulnerability
                $tag = Tag::firstOrCreate(['name' => $tag_name]);
                $article->tags()->attach($tag);
            }
        }

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
