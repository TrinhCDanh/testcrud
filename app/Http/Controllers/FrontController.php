<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontController extends Controller
{
    public function getIndex() {
        $data = DB::table('posts')
        ->join('categories', 'categories.id', '=', 'categories.id')
        ->join('cms_users', 'cms_users.id', '=', 'cms_users.id')
        ->select('posts.*', 'categories.name as name_categories', 'cms_users.name as name_author')
        ->orderby('posts.id', 'desc')
        ->get();
        //print_r($data);
        return view('home', compact('data'));
    }
}
