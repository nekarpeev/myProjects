<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoryName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryNameController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.categories.index', [
            'categories' => CategoryName::paginate(100)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        echo 'create';
        return view('admin.categories.create', [
            'category'   => [],
            'categories' => CategoryName::with('children')->where('parent_id', '0')->get(),
            'delimiter'   => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        echo 'store';
        CategoryName::create($request->all());
        return redirect()->route('admin.category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryName  $category
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryName $category) {
        echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryName  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryName $category) {
      echo 'Category edit';
      return view('admin.categories.edit', [
          'category'   => $category,
          'categories' => CategoryName::with('children')->where('parent_id', '0')->get(),
          'delimiter'   => ''
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryName  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryName $category) {
      echo 'update';
      $category->update($request->except('slug'));
      return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryName  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryName $category) {

        $category->delete();
        return redirect()->route('admin.category.index');
    }

}
