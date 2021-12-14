<?php

namespace App\Http\Controllers\Home;

use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $categorys = Category::with(['childrenRecursive'])->where('parent_id', 0)->get();
        $idCategory = $request->input('id') != ''? $request->input('id') : $categorys[0]['id'];
        $products = Product::select(['products.*','categorys.name as category_name'])
            ->join('categorys','categorys.id','=','products.category_id')
            ->where(function($query) use ($idCategory){
                $query->where('categorys.id',$idCategory)
                ->orWhere('categorys.parent_id',$idCategory);
            })->with('images');
            
            if($request->has('q')){
                $products = $products->where('products.name','like','%'.$request->input('q').'%');
            }

            $products = $products->orderBy('products.id','desc')->simplePaginate(16);
            
            if($request->ajax()){
                return view('home.includes.product-content',compact('categorys','products'));
            }
        return view('index',['categorys'=>$categorys, 'products' => $products]);
    }

    public function detail($slug){
        $product = Product::with('images')->where('slug',$slug)->first();
        return view('home.products.detail', compact('product'));

    }
}
