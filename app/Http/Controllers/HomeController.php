<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::active()->get();
        $featuredProducts = Product::active()->featured()->latest()->take(8)->get();
        $categories = Category::active()->parentCategories()->with('children')->orderBy('sort_order')->get();
        $latestProducts = Product::active()->latest()->take(8)->get();
        $latestPosts = Post::published()->ofType('blog')->latest()->take(4)->get();

        return view('home', compact('banners', 'featuredProducts', 'categories', 'latestProducts', 'latestPosts'));
    }

    public function about()
    {
        return view('about');
    }
}
