<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::published()->orderBy('id', 'desc')->paginate(15);

        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $description = 'Add Article';

        return view('article.form', compact('description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        Auth::user()->articles()->create($request->all());

        flash()->success('Article has been created!');

        return redirect('article');
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $description = 'Edit Article';

        return view('article.form', compact('article', 'description'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Article $article
     * @param ArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        flash()->success('Article has been edited!');

        return redirect('article/' . $article->getKey());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
