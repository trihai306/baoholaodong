<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Sitemap
Route::get('/sitemap.xml', function () {
    $products = Product::where('is_active', true)->select('slug', 'updated_at')->get();
    $categories = Category::where('is_active', true)->select('slug', 'updated_at')->get();
    $posts = Post::where('is_published', true)->select('slug', 'updated_at')->get();

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    $staticPages = [
        ['loc' => route('home'), 'changefreq' => 'daily', 'priority' => '1.0'],
        ['loc' => route('about'), 'changefreq' => 'monthly', 'priority' => '0.8'],
        ['loc' => route('products.index'), 'changefreq' => 'weekly', 'priority' => '0.9'],
        ['loc' => route('posts.index'), 'changefreq' => 'weekly', 'priority' => '0.8'],
        ['loc' => route('contact'), 'changefreq' => 'monthly', 'priority' => '0.7'],
    ];

    foreach ($staticPages as $page) {
        $xml .= '<url><loc>' . $page['loc'] . '</loc><changefreq>' . $page['changefreq'] . '</changefreq><priority>' . $page['priority'] . '</priority></url>';
    }

    foreach ($categories as $cat) {
        $xml .= '<url><loc>' . route('products.category', $cat->slug) . '</loc><lastmod>' . $cat->updated_at->toW3cString() . '</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
    }

    foreach ($products as $product) {
        $xml .= '<url><loc>' . route('products.show', $product->slug) . '</loc><lastmod>' . $product->updated_at->toW3cString() . '</lastmod><changefreq>weekly</changefreq><priority>0.7</priority></url>';
    }

    foreach ($posts as $post) {
        $xml .= '<url><loc>' . route('posts.show', $post->slug) . '</loc><lastmod>' . $post->updated_at->toW3cString() . '</lastmod><changefreq>monthly</changefreq><priority>0.6</priority></url>';
    }

    $xml .= '</urlset>';

    return response($xml, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gioi-thieu', [HomeController::class, 'about'])->name('about');

Route::get('/san-pham', [ProductController::class, 'index'])->name('products.index');
Route::get('/san-pham/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/danh-muc/{slug}', [ProductController::class, 'category'])->name('products.category');

Route::get('/tin-tuc', [PostController::class, 'index'])->name('posts.index');
Route::get('/tin-tuc/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/lien-he', [ContactController::class, 'index'])->name('contact');
Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store');

// Auth Routes (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
