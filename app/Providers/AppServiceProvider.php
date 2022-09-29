<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Support\ServiceProvider;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\TagFormRequest;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(BaseFormRequest::class,function($q){
            $route=Route::current()->uri();
            if($route== 'api/categories'){
                return new CategoryFormRequest;
            } else if($route== 'api/tags'){
                return new TagFormRequest;
            }

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
