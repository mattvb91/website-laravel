<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class TagController extends Controller
{

    public function show(Tag $tag)
    {
        $articles = $tag->articles()->published()->get();

        return view('article.index', compact('articles'));
    }
}
