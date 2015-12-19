<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Article;

class ArticleController extends CrudController
{

    function getModelClass()
    {
        return Article::class;
    }
}
