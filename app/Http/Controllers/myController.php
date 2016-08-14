<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class myController extends Controller
{
    public function index()
    {
        $product = new \App\Product();
        $product->name = "testhello~~ 從 Controller 123";
        $product->save();
        return view("home", ["title" => "Home"]);
    }

    public function contact_us()
    {
        return view("contact_us", ["title" => "Contact Us"]);
    }

    public function login()
    {
        return view("login", ["title" => "Login"]);
    }

    public function logout()
    {
        return "登出";
    }

    public function products()
    {
        return view("products", ["title" => "Products"]);
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
        return view("products_details", ["title" => "Products Details", "i" => $id]);
    }

    public function blog()
    {
        return view("blog", ["title" => "Blog"]);
    }

    public function blog_post($i)
    {
        return view("blog_post", ["title" => "Blog", "i" => $i]);
    }

    public function search($key_word)
    {
        return "搜尋:$key_word";
    }

    public function cart()
    {
        return view("cart", ["title" => "Cart"]);
    }

    public function checkout()
    {
        return view("checkout", ["title" => "Checkout"]);
    }
}
