<?php
 namespace App\Libraries;

 use Illuminate\View\View;
 use App\Category;

 class CategoryComposer
 {
     public function compose(View $view){
         $categorys = Category::with(['childrenRecursive'])->where('parent_id',0)->get();
         $view->with('categorys', $categorys);
     }
 }