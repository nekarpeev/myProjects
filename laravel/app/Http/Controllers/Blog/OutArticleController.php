<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CategoryName;

class OutArticleController extends Controller
{
    public function index()
    {
        //echo 'OutArticleController index';
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);
        $categories = CategoryName::get();
        return view('blog.articles.index', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }

    public function show($id)
    {
        //echo 'OutArticleController show';
        print_r('article id: ' . $id);
        // $id->title;
        //$article = Article::get()->where('id', $id);
        $article = Article::find($id);
        $categories = CategoryName::get();
        //$article = Article->wh
        return view('blog.articles.show', [
            'article' => $article,
            'categories' => $categories
        ]);

    }


}