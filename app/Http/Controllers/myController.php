<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use ShoppingCart;

use Illuminate\Support\Facades\Redirect;

class myController extends Controller
{
    var $products;
    var $categories;
    var $brands;

    public function __construct()
    {
        $this->products = \App\Product::all(["id", "name", "price"]);
        $this->categories = \App\Category::all(["name"]);
        $this->brands = \App\Brand::all(["name"]);
    }

    public function index()
    {
        return view("home", ["title" => "Home", "description" => "網頁說明", "products" => $this->products, "categories" => $this->categories, "brands" => $this->brands]);
    }

    public function contact_us()
    {
        return view("contact_us", ["title" => "Contact Us", "description" => "網頁說明"]);
    }

    public function login()
    {
        return view("login", ["title" => "Login", "description" => "網頁說明"]);
    }

    public function logout()
    {
        return "登出";
    }

    public function products()
    {
        return view("products", ["title" => "Products", "description" => "網頁說明", "products" => $this->products, "categories" => $this->categories, "brands" => $this->brands]);
    }

    public function products_category()
    {
        return "產品目錄";
    }

    public function products_brands()
    {
        return "產品品牌";
    }

    public function products_details($id)
    {
        return view("products_details", ["title" => "Products Details", "description" => "網頁說明", "i" => $id, "products" => $this->products, "categories" => $this->categories, "brands" => $this->brands]);
    }

    public function blog()
    {
        return view("blog", ["title" => "Blog", "description" => "網頁說明", "products" => $this->products, "categories" => $this->categories, "brands" => $this->brands]);
    }

    public function blog_post($i)
    {
        return view("blog_post", ["title" => "Blog", "description" => "網頁說明", "i" => $i]);
    }

    public function search($key_word)
    {
        return "搜尋:$key_word";
    }

    public function cart()
    {
        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            $product = \App\Product::find($product_id);
            ShoppingCart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
        }

        $cart = ShoppingCart::content();

        return view("cart", ["title" => "Cart", "description" => "網頁說明", "cart" => $cart]);
    }

    public function cart_add()
    {
        $product_id = Request::get("product_id");
        $product = \App\Product::find($product_id);

        ShoppingCart::add(["id" => $product_id,
                    "name" => $product->name,
                    "qty" => 1,
                    "price" => $product->price]);


        return redirect()->to("cart",["title" => "Cart", "description" => "網頁說明"]);
    }
    public function checkout()
    {
        return view("checkout", ["title" => "Checkout"]);
    }
}
