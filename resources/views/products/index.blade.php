@extends('layouts.app')

@section('title', 'Sản phẩm bảo hộ lao động - Đầy đủ các loại')
@section('meta_description', 'Danh mục sản phẩm bảo hộ lao động chính hãng: mũ bảo hộ, kính bảo hộ, găng tay, giày bảo hộ, quần áo bảo hộ, khẩu trang, dây đai an toàn, thiết bị PCCC. Giá tốt nhất thị trường.')
@section('canonical', route('products.index'))

@section('breadcrumb')
<nav class="flex text-sm" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-2">
        <li><a href="{{ route('home') }}" class="text-secondary-500 hover:text-primary-500 transition"><i class="fas fa-home"></i></a></li>
        <li class="text-secondary-300">/</li>
        <li class="text-secondary-800 font-medium">Sản phẩm</li>
    </ol>
</nav>
@endsection

@section('content')
<section class="py-10 lg:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-4 lg:gap-8">
            {{-- Sidebar --}}
            <aside class="lg:col-span-1 mb-8 lg:mb-0">
                {{-- Categories --}}
                <div class="bg-white rounded-2xl border border-secondary-100 overflow-hidden mb-6">
                    <div class="bg-gradient-to-r from-secondary-800 to-secondary-900 px-5 py-4">
                        <h3 class="text-white font-semibold flex items-center"><i class="fas fa-list mr-2 text-primary-400"></i>Danh mục</h3>
                    </div>
                    <div class="p-2">
                        @foreach($categories as $category)
                            <a href="{{ route('products.category', $category->slug) }}"
                               class="flex items-center justify-between px-4 py-2.5 rounded-xl text-sm font-medium transition
                               {{ request('category') == $category->id ? 'bg-primary-50 text-primary-600' : 'text-secondary-600 hover:bg-secondary-50 hover:text-primary-600' }}">
                                <span>{{ $category->name }}</span>
                                <span class="text-xs text-secondary-400">{{ $category->products->count() }}</span>
                            </a>
                            @foreach($category->children as $child)
                                <a href="{{ route('products.category', $child->slug) }}"
                                   class="flex items-center px-4 py-2 ml-4 rounded-lg text-sm text-secondary-500 hover:text-primary-600 hover:bg-secondary-50 transition">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-secondary-300"></i>{{ $child->name }}
                                </a>
                            @endforeach
                        @endforeach
                    </div>
                </div>

                {{-- Search --}}
                <div class="bg-white rounded-2xl border border-secondary-100 p-5">
                    <h3 class="font-semibold text-secondary-800 mb-3 flex items-center"><i class="fas fa-search mr-2 text-primary-500"></i>Tìm kiếm</h3>
                    <form action="{{ route('products.index') }}" method="GET">
                        <div class="relative">
                            <input type="text" name="search" class="w-full px-4 py-3 pr-10 bg-secondary-50 border border-secondary-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition" placeholder="Tìm sản phẩm..." value="{{ request('search') }}">
                            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-secondary-400 hover:text-primary-500">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </aside>

            {{-- Products --}}
            <div class="lg:col-span-3">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                    <h1 class="text-2xl font-bold text-secondary-900">Tất cả sản phẩm</h1>
                    <select class="px-4 py-2.5 bg-white border border-secondary-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500" onchange="window.location.href=this.value">
                        <option value="{{ route('products.index', ['sort' => 'latest']) }}" {{ request('sort', 'latest') == 'latest' ? 'selected' : '' }}>Mới nhất</option>
                        <option value="{{ route('products.index', ['sort' => 'price_asc']) }}" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                        <option value="{{ route('products.index', ['sort' => 'price_desc']) }}" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                        <option value="{{ route('products.index', ['sort' => 'name']) }}" {{ request('sort') == 'name' ? 'selected' : '' }}>Tên A-Z</option>
                    </select>
                </div>

                @if($products->count())
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 lg:gap-6">
                    @foreach($products as $product)
                        @include('products._card', ['product' => $product])
                    @endforeach
                </div>
                <div class="mt-8">{{ $products->withQueryString()->links() }}</div>
                @else
                <div class="text-center py-20 bg-white rounded-2xl border border-secondary-100">
                    <i class="fas fa-box-open text-5xl text-secondary-200 mb-4"></i>
                    <p class="text-secondary-500 text-lg">Không tìm thấy sản phẩm nào.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
