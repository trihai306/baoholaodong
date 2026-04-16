<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::active()->with('category');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('sort')) {
            match ($request->sort) {
                'price_asc' => $query->orderBy('price', 'asc'),
                'price_desc' => $query->orderBy('price', 'desc'),
                'name' => $query->orderBy('name', 'asc'),
                default => $query->latest(),
            };
        } else {
            $query->latest();
        }

        $products = $query->paginate(12);
        $categories = Category::active()->parentCategories()->with('children')->orderBy('sort_order')->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->active()->firstOrFail();
        $product->increment('view_count');

        $relatedProducts = Product::active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function category(string $slug)
    {
        $category = Category::where('slug', $slug)->active()->with('children')->firstOrFail();

        // If parent category, show products from this category AND all children
        $categoryIds = collect([$category->id]);
        if ($category->children->count()) {
            $categoryIds = $categoryIds->merge($category->children->pluck('id'));
        }

        $products = Product::active()->whereIn('category_id', $categoryIds)->latest()->paginate(12);
        $categories = Category::active()->parentCategories()->with('children')->orderBy('sort_order')->get();

        return view('products.category', compact('category', 'products', 'categories'));
    }
}
