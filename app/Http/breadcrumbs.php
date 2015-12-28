<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > Blog
Breadcrumbs::register('blog', function ($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog'));
});

// Home > Blog > Article
Breadcrumbs::register('article', function ($breadcrumbs, $article)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($article->getTitle());
});
