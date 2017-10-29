<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function index() {

        return view('test');

             //Пример простого запроса к БД
//        $users = DB::table('articles')->get();
//        foreach ($users as $user) {
//            echo '<pre>';
//            print_r($user);
//            echo '</pre>';
//        }

    }
}
