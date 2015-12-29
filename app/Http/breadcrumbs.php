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

// Home > Tags
Breadcrumbs::register('tags', function ($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tag', route('tags'));
});

// Home > Tag > Name
Breadcrumbs::register('tag', function ($breadcrumbs, $tag)
{
    $breadcrumbs->parent('tags');
    $breadcrumbs->push($tag->getName());
});
