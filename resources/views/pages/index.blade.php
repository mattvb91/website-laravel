@extends('layout.app')

@section('header')
    <link rel="stylesheet" href="/css/octicons.css">
    <link href="/css/github-activity.css" rel="stylesheet"/>
    <script type="text/javascript" src="/js/mustache.js"></script>
    <script src="/js/github-activity.js"></script>
@endsection

@section('content')
    {!! \App\Models\Page::getPageContent(\App\Models\Page::TYPE_HOMEPAGE) !!}
    <div id="feed"></div>
@endsection