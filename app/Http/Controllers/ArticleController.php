<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{

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
     * Display the specified resource.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }
}
