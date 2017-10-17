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
            'categories' => CategoryName::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.categories.create', [
            'category'   => [],
            'categories' => CategoryName::with('children')->where('parent_id', '0')->get(),
            'delimitr'   => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryName  $categoryName
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryName $categoryName) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryName  $categoryName
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryName $categoryName) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryName  $categoryName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryName $categoryName) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryName  $categoryName
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryName $categoryName) {
        //
    }

}
