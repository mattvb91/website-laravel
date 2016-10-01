<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class ArticleController extends \App\Http\Controllers\ArticleController
{

    /**
     * Override index here because we want every article in the system
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(15);;

        return view('admin.article.index', compact('articles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $description = 'Add Article';
        $tags = Tag::pluck('name', 'id');

        return view('admin.article.form', compact('description', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());
        /* @var $article Article */

        $article->tags()->attach($request->input('tag_list'));

        flash()->success('Article has been created!');

        return redirect('admin\article');
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
        $tags = Tag::pluck('name', 'id');

        return view('admin.article.form', compact('article', 'description', 'tags'));
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

        if ($tags = $request->get('tag_list'))
        {
            $article->tags()->sync($tags);
        }

        flash()->success('Article has been edited!');

        return Redirect::back();
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
