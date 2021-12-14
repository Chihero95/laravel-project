<?php
 namespace App\Libraries;

 use Illuminate\View\View;
 use Cart;

 class CartComposer
 {
     public function compose(View $view)
     {
         $carts = Cart::content();
         $cartTotal = Cart::total(0,3,'.');
         $cartSubTotal = Cart::subtotal(0,3,'.');
         $cartTax = Cart::tax(0,3,'.');
         $view->with(['carts' => $carts, 'cartTotal' => $cartTotal, 'cartSubTotal' => $cartSubTotal, 'cartTax' => $cartTax]);
         }
 }