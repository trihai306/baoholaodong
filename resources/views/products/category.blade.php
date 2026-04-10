@extends('layouts.app')

@section('title', $category->name . ' - Bảo Hộ Lao Động')

@section('breadcrumb')
<nav class="flex text-sm" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-2">
        <li><a href="{{ route('home') }}" class="text-secondary-500 hover:text-primary-500 transition"><i class="fas fa-home"></i></a></li>
        <li class="text-secondary-300">/</li>
        <li><a href="{{ route('products.index') }}" class="text-secondary-500 hover:text-primary-500 transition">Sản phẩm</a></li>
        <li class="text-secondary-300">/</li>
        <li class="text-secondary-800 font-medium">{{ $category->name }}</li>
    </ol>
</nav>
@endsection

@section('content')
<section class="py-10 lg:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-4 lg:gap-8">
            <aside class="lg:col-span-1 mb-8 lg:mb-0">
                <div class="bg-white rounded-2xl border border-secondary-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-secondary-800 to-secondary-900 px-5 py-4">
                        <h3 class="text-white font-semibold flex items-center"><i class="fas fa-list mr-2 text-primary-400"></i>Danh mục</h3>
                    </div>
                    <div class="p-2">
                        @foreach($categories as $cat)
                            <a href="{{ route('products.category', $cat->slug) }}"
                               class="flex items-center justify-between px-4 py-2.5 rounded-xl text-sm font-medium transition
                               {{ $cat->id == $category->id ? 'bg-primary-50 text-primary-600' : 'text-secondary-600 hover:bg-secondary-50 hover:text-primary-600' }}">
                                <span>{{ $cat->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <div class="mb-8">
                    <h1 class="text-2xl lg:text-3xl font-extrabold text-secondary-900 mb-2">{{ $category->name }}</h1>
                    @if($category->description)
                        <p class="text-secondary-500">{{ $category->description }}</p>
                    @endif
                </div>

                @if($products->count())
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 lg:gap-6">
                    @foreach($products as $product)
                        @include('products._card', ['product' => $product])
                    @endforeach
                </div>
                <div class="mt-8">{{ $products->links() }}</div>
                @else
                <div class="text-center py-20 bg-white rounded-2xl border border-secondary-100">
                    <i class="fas fa-box-open text-5xl text-secondary-200 mb-4"></i>
                    <p class="text-secondary-500 text-lg">Chưa có sản phẩm trong danh mục này.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
