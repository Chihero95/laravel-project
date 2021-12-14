<?php
 namespace App\Libraries;

 use Illuminate\View\View;
 use App\Product;

 class ProductHotComposer
 {
     public function compose(View $view){
         $productHot = Product::with('images')->where('status_hight_light',1)->get();
         $view->with('productHots', $productHot);
     }
 }