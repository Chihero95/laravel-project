<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index($slug){
        $category = Category::with(['products','products.images'])->where('categorys.slug', $slug)->first();
        $products = $category->products()->simplePaginate(16);

        return view('home.categorys.index', compact('category','products'));
    }
}
