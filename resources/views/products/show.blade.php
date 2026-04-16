@extends('layouts.app')

@section('title', $product->name . ' - Bảo Hộ Lao Động')
@section('meta_description', $product->short_description ?? 'Mua ' . $product->name . ' chính hãng tại ' . ($setting['company_short_name'] ?? 'Lộc Thịnh') . '. Giá tốt, giao hàng toàn quốc. Hotline: ' . ($setting['phone_primary_display'] ?? '0964.186.111'))
@section('canonical', route('products.show', $product->slug))
@section('og_type', 'product')
@section('og_image', $product->image ? asset('storage/' . $product->image) : asset('images/logo.jpg'))

@section('breadcrumb')
<nav class="flex text-sm" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-2 text-xs">
        <li><a href="{{ route('home') }}" class="text-dark-400 hover:text-primary-500 transition"><i class="fas fa-home"></i></a></li>
        <li class="text-dark-300">/</li>
        <li><a href="{{ route('products.index') }}" class="text-dark-400 hover:text-primary-500 transition">Sản phẩm</a></li>
        <li class="text-dark-300">/</li>
        <li><a href="{{ route('products.category', $product->category->slug) }}" class="text-dark-400 hover:text-primary-500 transition">{{ $product->category->name }}</a></li>
        <li class="text-dark-300">/</li>
        <li class="text-dark-700 font-medium truncate max-w-[200px]">{{ $product->name }}</li>
    </ol>
</nav>
@endsection

@section('content')
<section class="py-10 lg:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Product Detail --}}
        <div class="bg-white rounded-3xl border border-dark-100 overflow-hidden shadow-sm">
            <div class="lg:grid lg:grid-cols-5">
                {{-- Image --}}
                <div class="lg:col-span-2 p-6 lg:p-10 bg-gradient-to-br from-dark-50 to-dark-100/50 flex items-center justify-center relative">
                    @if($product->sale_price)
                    <div class="absolute top-6 left-6 bg-red-500 text-white text-sm font-bold px-4 py-2 rounded-xl shadow-lg shadow-red-500/30">
                        -{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}% OFF
                    </div>
                    @endif
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="max-h-[450px] w-full object-contain rounded-2xl" alt="{{ $product->name }}">
                    @else
                        <div class="w-full aspect-square max-h-[450px] bg-dark-100 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-image text-6xl text-dark-200"></i>
                        </div>
                    @endif
                </div>

                {{-- Info --}}
                <div class="lg:col-span-3 p-6 lg:p-10">
                    {{-- Top badges --}}
                    <div class="flex flex-wrap items-center gap-2 mb-4">
                        <span class="inline-flex items-center px-3 py-1 bg-primary-50 text-primary-600 text-xs font-bold rounded-lg">
                            <i class="fas fa-folder mr-1.5"></i>{{ $product->category->name }}
                        </span>
                        @if($product->stock > 0)
                            <span class="inline-flex items-center px-3 py-1 bg-green-50 text-green-600 text-xs font-bold rounded-lg">
                                <i class="fas fa-check-circle mr-1.5"></i>Còn hàng ({{ $product->stock }})
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-lg">Hết hàng</span>
                        @endif
                        @if($product->certification)
                            <span class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-lg">
                                <i class="fas fa-award mr-1.5"></i>{{ $product->certification }}
                            </span>
                        @endif
                    </div>

                    @if($product->brand)
                    <div class="text-xs text-dark-400 font-semibold uppercase tracking-wider mb-2">{{ $product->brand }}</div>
                    @endif

                    <h1 class="text-2xl lg:text-3xl font-black text-dark-900 mb-5 leading-tight">{{ $product->name }}</h1>

                    {{-- Price --}}
                    <div class="flex items-baseline gap-3 mb-6 p-5 bg-gradient-to-r from-dark-50 to-transparent rounded-2xl">
                        @if($product->sale_price)
                            <span class="text-3xl lg:text-4xl font-black text-red-500">{{ $product->formatted_sale_price }}</span>
                            <span class="text-xl text-dark-400 line-through">{{ $product->formatted_price }}</span>
                            <span class="inline-flex items-center px-3 py-1.5 bg-red-500 text-white text-sm font-bold rounded-xl">
                                Tiết kiệm {{ number_format($product->price - $product->sale_price, 0, ',', '.') }}đ
                            </span>
                        @else
                            <span class="text-3xl lg:text-4xl font-black text-primary-600">{{ $product->formatted_price }}</span>
                        @endif
                    </div>

                    @if($product->short_description)
                        <p class="text-dark-600 mb-6 leading-relaxed">{{ $product->short_description }}</p>
                    @endif

                    {{-- Specs Grid --}}
                    <div class="grid grid-cols-2 gap-3 mb-8">
                        @foreach([
                            ['icon' => 'fa-barcode', 'label' => 'Mã SP', 'value' => $product->sku],
                            ['icon' => 'fa-industry', 'label' => 'Thương hiệu', 'value' => $product->brand],
                            ['icon' => 'fa-globe-asia', 'label' => 'Xuất xứ', 'value' => $product->origin],
                            ['icon' => 'fa-layer-group', 'label' => 'Chất liệu', 'value' => $product->material],
                        ] as $spec)
                            @if($spec['value'])
                            <div class="flex items-center p-3 bg-dark-50 rounded-xl">
                                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center mr-3 shrink-0 shadow-sm">
                                    <i class="fas {{ $spec['icon'] }} text-primary-500 text-xs"></i>
                                </div>
                                <div>
                                    <div class="text-[10px] text-dark-400 uppercase tracking-wider">{{ $spec['label'] }}</div>
                                    <div class="text-sm font-semibold text-dark-800">{{ $spec['value'] }}</div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>

                    {{-- CTA --}}
                    <div class="flex flex-wrap gap-3 mb-6">
                        <a href="tel:{{ $setting['phone_primary'] ?? '0964186111' }}" class="flex-1 min-w-[180px] inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold rounded-2xl transition-all shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 hover:-translate-y-0.5">
                            <i class="fas fa-phone-alt mr-2.5"></i>Gọi đặt hàng
                        </a>
                        <a href="https://zalo.me/{{ $setting['zalo_phone'] ?? '0964186111' }}" target="_blank" class="flex-1 min-w-[180px] inline-flex items-center justify-center px-6 py-4 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-2xl transition-all shadow-lg shadow-blue-500/20">
                            <i class="fas fa-comment-dots mr-2.5"></i>Chat Zalo
                        </a>
                        <a href="{{ route('contact') }}" class="flex-1 min-w-[180px] inline-flex items-center justify-center px-6 py-4 bg-dark-100 hover:bg-dark-200 text-dark-700 font-bold rounded-2xl transition">
                            <i class="fas fa-envelope mr-2.5"></i>Liên hệ tư vấn
                        </a>
                    </div>

                    {{-- Trust --}}
                    <div class="flex flex-wrap gap-4 pt-5 border-t border-dark-100 text-xs text-dark-500">
                        <span class="flex items-center"><i class="fas fa-shield-alt text-green-500 mr-1.5"></i>Hàng chính hãng</span>
                        <span class="flex items-center"><i class="fas fa-undo text-blue-500 mr-1.5"></i>Đổi trả 30 ngày</span>
                        <span class="flex items-center"><i class="fas fa-truck text-primary-500 mr-1.5"></i>Miễn phí vận chuyển</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Description --}}
        @if($product->description)
        <div class="mt-8 bg-white rounded-2xl border border-dark-100 overflow-hidden" x-data="{ tab: 'desc' }">
            <div class="border-b border-dark-100 px-6 lg:px-8 flex space-x-0">
                <button @click="tab = 'desc'" :class="tab === 'desc' ? 'text-primary-600 border-primary-500' : 'text-dark-400 border-transparent hover:text-dark-600'" class="py-4 px-6 text-sm font-bold border-b-2 transition">
                    <i class="fas fa-file-alt mr-2"></i>Mô tả chi tiết
                </button>
                <button @click="tab = 'spec'" :class="tab === 'spec' ? 'text-primary-600 border-primary-500' : 'text-dark-400 border-transparent hover:text-dark-600'" class="py-4 px-6 text-sm font-bold border-b-2 transition">
                    <i class="fas fa-list-ul mr-2"></i>Thông số
                </button>
            </div>
            <div class="px-6 lg:px-8 py-8">
                <div x-show="tab === 'desc'" class="prose prose-sm lg:prose-base max-w-none text-dark-700 prose-headings:text-dark-900 prose-a:text-primary-500">
                    {!! $product->description !!}
                </div>
                <div x-show="tab === 'spec'" x-cloak>
                    <table class="w-full text-sm">
                        @foreach([
                            ['Mã sản phẩm', $product->sku],
                            ['Thương hiệu', $product->brand],
                            ['Xuất xứ', $product->origin],
                            ['Chất liệu', $product->material],
                            ['Chứng nhận', $product->certification],
                            ['Tồn kho', $product->stock > 0 ? 'Còn hàng ('.$product->stock.')' : 'Hết hàng'],
                        ] as [$label, $value])
                            @if($value)
                            <tr class="border-b border-dark-50"><td class="py-3 text-dark-500 w-40">{{ $label }}</td><td class="py-3 font-medium text-dark-800">{{ $value }}</td></tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @endif

        {{-- Related --}}
        @if($relatedProducts->count())
        <div class="mt-14">
            <h2 class="text-2xl font-black text-dark-900 mb-6">Sản phẩm liên quan</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6">
                @foreach($relatedProducts as $relProduct)
                    @include('products._card', ['product' => $relProduct])
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@push('seo')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Product",
    "name": "{{ $product->name }}",
    "description": "{{ $product->short_description ?? $product->name }}",
    "image": "{{ $product->image ? asset('storage/' . $product->image) : asset('images/logo.jpg') }}",
    "sku": "{{ $product->sku ?? '' }}",
    "brand": {
        "@@type": "Brand",
        "name": "{{ $product->brand ?? ($setting['company_short_name'] ?? 'Lộc Thịnh') }}"
    },
    "offers": {
        "@@type": "Offer",
        "url": "{{ route('products.show', $product->slug) }}",
        "priceCurrency": "VND",
        "price": "{{ $product->sale_price ?? $product->price }}",
        "availability": "{{ $product->stock > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock' }}",
        "seller": {
            "@@type": "Organization",
            "name": "{{ $setting['company_name'] ?? 'Công ty TNHH Vật Tư Tổng Hợp Lộc Thịnh' }}"
        }
    }
}
</script>
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        {"@@type": "ListItem", "position": 1, "name": "Trang chủ", "item": "{{ route('home') }}"},
        {"@@type": "ListItem", "position": 2, "name": "Sản phẩm", "item": "{{ route('products.index') }}"},
        {"@@type": "ListItem", "position": 3, "name": "{{ $product->category->name }}", "item": "{{ route('products.category', $product->category->slug) }}"},
        {"@@type": "ListItem", "position": 4, "name": "{{ $product->name }}"}
    ]
}
</script>
@endpush
