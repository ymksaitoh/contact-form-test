<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategories()
    {
        $categories = DB::table('categories')->get();
        return view('categories', compact('categories'));
    }
}
