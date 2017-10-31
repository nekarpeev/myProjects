<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\CategoryName;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        $categories = CategoryName::get();
        return view('blog.index', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }
}
