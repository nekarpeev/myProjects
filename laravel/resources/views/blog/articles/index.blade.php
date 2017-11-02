@extends('blog.static.index')

@section('article_list')

@forelse($articles as $article)
    {{!$article->title = strip_tags($article->title)}}
    {{!$article->description_short = strip_tags($article->description_short)}}
    <!-- Blog Post Start -->
    <div class="col-md-12 blog-post">
        <div class="post-title">
            <a href="{{ route('blog.articles.show', $article) }}"><h1>{{$article->title}}</h1></a>
        </div>
        <div class="post-info">
            <span>November 23, 2016 / by <a href="#" target="_blank">Alex Parker</a></span>
        </div>
        <p>{{$article->description_short}}</p>
        <a href="{{ route('blog.articles.show',  $article) }}"
           class="button button-style button-anim fa fa-long-arrow-right"><span>Read More</span></a>
    </div>
@empty
    Нет публикаций
@endforelse

@endsection