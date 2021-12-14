<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Libraries\CategoryComposer;
use App\Libraries\ProductHotComposer;
use App\Libraries\CartComposer;

class ViewShareServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }
    public function boot(){
        View::composer(
            'home.*',
           CategoryComposer::class
        );
        View::composer(
            'home.*',
            ProductHotComposer::class
        );
        View::composer(
            'home.*',
            CartComposer::class
        );
    }
}