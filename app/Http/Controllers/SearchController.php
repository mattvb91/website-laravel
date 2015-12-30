<?php

namespace App\Http\Controllers;


use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * TODO allow searching by tags
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function search(Request $request)
    {
        $term = $request->get('term');
        $articles = Article::search($term)->paginate(15);

        return view('article.index', compact('articles'));
    }
}