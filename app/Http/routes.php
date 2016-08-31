<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', "myController@index");

Route::get('/contact_us', "myController@contact_us");

Route::get('/login', "myController@login");

Route::get('/logout', "myController@logout");

Route::get('/products', "myController@products");

Route::get('/products/category', "myController@products_category");

Route::get('/products/brands', "myController@products_brands");

Route::get('/products/details/{id}', "myController@products_details");

Route::get('/blog', "myController@blog");

Route::get('/blog/post/{id}', "myController@blog_post");

Route::get('/search/{key_word}', "myController@search");

Route::get('/cart', "myController@cart");

Route::post("/cart", "myController@cart");
Route::post("/cart/add", "myController@cart_add");

Route::get("/clear_cart","myController@clear_cart");

Route::get('/checkout', ["middleware" => "auth", "uses" => "myController@checkout"]);

Route::post("/register", "myController@register");

Route::post("/auth/login", "myController@auth_login");

Route::get("/auth/logout", "myController@auth_logout");

Route::post("/register", "myController@register");

Route::get("/fb_redirect", "myController@fb_redirect");

Route::get("/fb_callback", "myController@fb_callback");

Route::get('/account', ["middleware" => "auth", "uses" => "myController@account"]);

Route::get('/test/write', function (){
    $product = new \App\Product();
//    $product->name = "test";
//    $product->title = "";
//    $product->description = "";
//    $product->price = "";
//    $product->category_id = "";
//    $product->brand_id = "";
//    $product->created_at_ip = "";
//    $product->updated_at_ip = "";
//    $product->save();

    $product->create(["name"=>"batch-asign", "title"=>"batch-title"]);
});

Route::get('/test/read', function (){
    $product = new \App\Product();

    $product_datas = $product->all(["id","name"]);

    foreach($product_datas as $product_data)
    {
        echo "$product_data->id, $product_data->name, $product_data->title <br>";
    }
});

Route::get('/test/update/{id}', function ($id){
    $product = \App\Product::find($id);
    $product->name = "更新測試";
    $product->save();

    return redirect("/test/read");
});

Route::get('/test/delete/{id}', function ($id){
    $product = \App\Product::find($id);
    $product->delete();

    return redirect("/test/read");
});

Route::group([
    'namespace' => 'ScottChayaa\Allpay\Controllers',
    'prefix'    => 'allpay_demo_201608'],
    function () {
        Route::get('/', 'DemoController@index');
        Route::get('/checkout', 'DemoController@checkout');
    }
);


