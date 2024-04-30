<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    protected $cate;
    protected $product;
    public function __construct(){
        $this->cate= new Categories;
        $this->product= new Product;
    }
    public function boot(): void
    {
        view()->composer('*',function($view){
            $list_category =  $this->cate->showall(); 
            $cart=Session()->get('cart',[]);
             // check favorite
        if(Auth::check()){
            // nếu đăng nhập rồi thì chắc những sản phẩm nào đã yêu thích
            $favorite=$this->product->favorite_product();
        }else{
            // ngược lại rỗng
            $favorite='';
        }
            $view->with(compact('list_category','cart','favorite'));
        });
        Paginator::useBootstrap();
    }
}
