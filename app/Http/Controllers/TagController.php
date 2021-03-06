<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use App\Http\Requests;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tag.index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        $articles = $tag->articles()->published()->orderBy('id','desc')->paginate(5);

        return view('article.index', compact('articles'));
    }
}
