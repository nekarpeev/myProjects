<?php

    namespace App\Http\Controllers\Admin;

    use App\Models\Article;
    use App\Models\CategoryName;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use DB;

    class ArticleController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            echo 'article index';

            $categoryables = DB::table('categoryables')->get();

            return view('admin.articles.index', [
                'articles'      => Article::orderBy('created_at', 'desc')->paginate(10),
                'categoryables' => $categoryables,
                'categories'    => CategoryName::get(),
            ]);


        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            echo 'article create';
            return view('admin.articles.create', [
                'article'    => [],
                'categories' => CategoryName::with('children')->where('parent_id', '0')->get(),
                'delimiter'  => ''

            ]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {

            $article = Article::create($request->all());

            // Categories
            if ($request->input('categories')) :
                $article->categories()->attach($request->input('categories'));
            endif;

            return redirect()->route('admin.article.index');

        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Article $article
         * @return \Illuminate\Http\Response
         */
        public function show(Article $article)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Article $article
         * @return \Illuminate\Http\Response
         */
        public function edit(Article $article)
        {
            echo 'articles edit';
            return view('admin.articles.edit', [
                'article'    => $article,
                'categories' => CategoryName::with('children')->where('parent_id', '0')->get(),
                'delimiter'  => ''
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \App\Article $article
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Article $article)
        {
            echo 'articles edit';
            $article->update($request->except('slug'));

            // Categories
            $article->categories()->detach();
            if ($request->input('categories')) :
                $article->categories()->attach($request->input('categories'));
            endif;

            return redirect()->route('admin.article.index');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Article $article
         * @return \Illuminate\Http\Response
         */
        public function destroy(Article $article)
        {
            $article->categories()->detach();
            $article->delete();

            return redirect()->route('admin.article.index');
        }
    }
