<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\Admin\CategoryAddRequest;
use Illuminate\Support\Str;

class CategorysController extends Controller
{
    public function index() {
        $category = Category::with('parent')->paginate(10);
        return view('admin.categorys.index', ['category' => $category]);
    }

    public function create(){
        $category = Category::where('parent_id', 0)->get();
        //= select * from cateorys where parent_id = 0; 
        return view('admin.categorys.add', ['category' => $category]);
    }
    public function store(CategoryAddRequest $request){
        $inputData = $request->all();
        $category = new Category();
        $category->name = $inputData['name'];
        $category->slug = Str::slug($inputData['name'],'-');
        $category->parent_id = isset($inputData['parent_id']) ? $inputData['parent_id'] : 0;
        $category->save();
        return redirect()->route('auth.category');
    }
    
    public function detail($id){
        $categoryParent = Category::where('parent_id', 0)->get();
        $category = Category::find($id);

        return view('admin.categorys.edit', ['categoryParent' => $categoryParent, 'category' => $category]);
    }

    public function update(CategoryAddRequest $request, $id){
        $inputData = $request->all();
        $category = Category::find($id);
        $category->name = $inputData['name'];
        $category->slug = Str::slug($inputData['name'],'-');
        $category->parent_id = isset($inputData['parent_id']) ? $inputData['parent_id'] : 0;
        $category->save();
        return redirect()->route('auth.category');
    }
    public function delete($id){
        Category::where('id', $id)->delete(); //update category set delete_at = time noew where id=id;
        return redirect()->route('auth.category');
    }
}
