<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'Công ty TNHH Vật Tư Tổng Hợp Lộc Thịnh - Chuyên cung cấp trang thiết bị bảo hộ lao động chất lượng cao, đạt tiêu chuẩn quốc tế')">
    <title>@yield('title', 'Lộc Thịnh - Vật Tư Bảo Hộ Lao Động Chất Lượng Cao')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        primary: { 50:'#fff7ed',100:'#ffedd5',200:'#fed7aa',300:'#fdba74',400:'#fb923c',500:'#f97316',600:'#ea580c',700:'#c2410c',800:'#9a3412',900:'#7c2d12' },
                        dark: { 50:'#f8fafc',100:'#f1f5f9',200:'#e2e8f0',300:'#cbd5e1',400:'#94a3b8',500:'#64748b',600:'#475569',700:'#334155',800:'#1e293b',900:'#0f172a',950:'#020617' },
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delay': 'float 6s ease-in-out 3s infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'fade-in': 'fadeIn 0.8s ease-out',
                    },
                    keyframes: {
                        float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-20px)' } },
                        slideUp: { '0%': { opacity: 0, transform: 'translateY(30px)' }, '100%': { opacity: 1, transform: 'translateY(0)' } },
                        fadeIn: { '0%': { opacity: 0 }, '100%': { opacity: 1 } },
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }

        /* Swiper custom */
        .swiper-pagination-bullet-active { background: #f97316 !important; }
        .swiper-button-next, .swiper-button-prev { color: #f97316 !important; background: white; width: 44px !important; height: 44px !important; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,.1); }
        .swiper-button-next:after, .swiper-button-prev:after { font-size: 18px !important; font-weight: bold; }

        /* Glass morphism */
        .glass { background: rgba(255,255,255,.08); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,.1); }

        /* Gradient text */
        .gradient-text { background: linear-gradient(135deg, #f97316, #ea580c); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }

        /* Smooth card hover */
        .card-hover { transition: all .35s cubic-bezier(.25,.8,.25,1); }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 20px 60px -15px rgba(0,0,0,.15); }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        /* Preloader */
        .preloader { position: fixed; inset: 0; background: white; z-index: 9999; display: flex; align-items: center; justify-content: center; transition: opacity .5s, visibility .5s; }
        .preloader.hidden { opacity: 0; visibility: hidden; }

        /* Mega menu */
        .mega-menu { opacity: 0; visibility: hidden; transform: translateY(10px); transition: all .25s ease; }
        .mega-trigger:hover .mega-menu { opacity: 1; visibility: visible; transform: translateY(0); }
    </style>
    @stack('styles')
</head>
<body class="font-sans antialiased text-dark-800 bg-white" x-data="{ mobileOpen: false }">

    {{-- Preloader --}}
    <div class="preloader" id="preloader">
        <div class="flex flex-col items-center">
            <div class="w-12 h-12 border-4 border-primary-200 border-t-primary-500 rounded-full animate-spin"></div>
        </div>
    </div>

    {{-- Floating Contact Buttons --}}
    <div class="fixed bottom-6 left-6 z-50 flex flex-col space-y-3">
        {{-- Zalo --}}
        <a href="https://zalo.me/0964186111" target="_blank"
           class="w-[60px] h-[60px] rounded-full overflow-hidden shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all hover:scale-110 group relative">
            <img src="{{ asset('images/zalo-icon.png') }}" alt="Zalo" class="w-full h-full object-contain bg-white p-2.5">
            <span class="absolute left-full ml-3 bg-dark-800 text-white text-xs font-medium px-3 py-1.5 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition pointer-events-none">Chat Zalo</span>
        </a>
        {{-- Facebook Messenger --}}
        <a href="https://m.me/locthinh.vn" target="_blank"
           class="w-[60px] h-[60px] rounded-full overflow-hidden shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 transition-all hover:scale-110 group relative">
            <img src="{{ asset('images/messenger-icon.png') }}" alt="Messenger" class="w-full h-full object-cover">
            <span class="absolute left-full ml-3 bg-dark-800 text-white text-xs font-medium px-3 py-1.5 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition pointer-events-none">Chat Messenger</span>
        </a>
        {{-- Phone --}}
        <a href="tel:0964186111"
           class="w-[60px] h-[60px] rounded-full overflow-hidden shadow-lg shadow-blue-400/30 hover:shadow-blue-400/50 transition-all hover:scale-110 animate-pulse-slow group relative">
            <img src="{{ asset('images/phone-icon.png') }}" alt="Gọi điện" class="w-full h-full object-cover">
            <span class="absolute left-full ml-3 bg-dark-800 text-white text-xs font-medium px-3 py-1.5 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition pointer-events-none">0964.186.111</span>
        </a>
    </div>

    {{-- Back to top --}}
    <button onclick="window.scrollTo({top:0,behavior:'smooth'})" id="backToTop"
            class="fixed bottom-6 right-6 w-12 h-12 bg-dark-800 hover:bg-primary-500 text-white rounded-full shadow-xl hidden items-center justify-center transition-all z-50 hover:scale-110">
        <i class="fas fa-arrow-up text-sm"></i>
    </button>

    {{-- Top Bar --}}
    <div class="bg-dark-900 text-dark-400 text-xs hidden lg:block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2.5 flex justify-between items-center">
            <div class="flex items-center divide-x divide-dark-700">
                <a href="tel:0964186111" class="hover:text-primary-400 transition pr-5 flex items-center"><i class="fas fa-phone-alt mr-1.5 text-primary-500"></i>Hotline: <strong class="ml-1 text-white">0964.186.111</strong></a>
                <a href="mailto:thinhvtth.locthinh@gmail.com" class="hover:text-primary-400 transition px-5 flex items-center"><i class="fas fa-envelope mr-1.5 text-primary-500"></i>thinhvtth.locthinh@gmail.com</a>
                <span class="px-5 flex items-center"><i class="fas fa-map-marker-alt mr-1.5 text-primary-500"></i>074 LK KĐT HUD Trầu Cau, Võ Cường, Bắc Ninh</span>
            </div>
            <div class="flex items-center space-x-4">
                <span class="flex items-center"><i class="far fa-clock mr-1.5 text-primary-500"></i>T2 - T7: 8:00 - 17:30</span>
                <div class="flex items-center space-x-2 ml-4 pl-4 border-l border-dark-700">
                    <a href="#" class="w-7 h-7 bg-dark-800 hover:bg-primary-500 rounded-full flex items-center justify-center transition text-[10px]"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-7 h-7 bg-dark-800 hover:bg-red-500 rounded-full flex items-center justify-center transition text-[10px]"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="w-7 h-7 bg-dark-800 hover:bg-pink-500 rounded-full flex items-center justify-center transition text-[10px]"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
        </div>
    </div>

    {{-- Header --}}
    <header class="bg-white/95 backdrop-blur-lg sticky top-0 z-50 border-b border-dark-100" x-data="{ searchOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-[72px]">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center group shrink-0">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Lộc Thịnh" class="h-12 lg:h-14 w-auto object-contain">
                </a>

                {{-- Desktop Nav --}}
                <nav class="hidden lg:flex items-center space-x-1">
                    @php
                        $navItems = [
                            ['route' => 'home', 'label' => 'Trang chủ', 'check' => 'home'],
                            ['route' => 'about', 'label' => 'Giới thiệu', 'check' => 'about'],
                        ];
                        $navCategories = \App\Models\Category::active()->parentCategories()->with('children')->orderBy('sort_order')->get();
                    @endphp
                    @foreach($navItems as $item)
                        <a href="{{ route($item['route']) }}"
                           class="px-4 py-2 rounded-lg text-[13px] font-semibold transition-all duration-200
                           {{ request()->routeIs($item['check']) ? 'text-primary-600 bg-primary-50' : 'text-dark-600 hover:text-primary-600 hover:bg-primary-50/60' }}">
                            {{ $item['label'] }}
                        </a>
                    @endforeach

                    {{-- Mega Menu --}}
                    <div class="relative mega-trigger">
                        <a href="{{ route('products.index') }}"
                           class="px-4 py-2 rounded-lg text-[13px] font-semibold transition-all duration-200 flex items-center
                           {{ request()->routeIs('products.*') ? 'text-primary-600 bg-primary-50' : 'text-dark-600 hover:text-primary-600 hover:bg-primary-50/60' }}">
                            Sản phẩm <i class="fas fa-chevron-down ml-1.5 text-[10px]"></i>
                        </a>
                        <div class="mega-menu absolute top-full left-1/2 -translate-x-1/2 pt-4 w-[600px]">
                            <div class="bg-white rounded-2xl shadow-2xl shadow-dark-900/10 border border-dark-100 p-6">
                                <div class="grid grid-cols-3 gap-2">
                                    @foreach($navCategories as $cat)
                                    <a href="{{ route('products.category', $cat->slug) }}" class="flex items-center space-x-3 p-3 rounded-xl hover:bg-primary-50 transition group">
                                        <div class="w-10 h-10 bg-gradient-to-br from-primary-50 to-primary-100 group-hover:from-primary-100 group-hover:to-primary-200 rounded-xl flex items-center justify-center shrink-0 transition">
                                            <i class="fas fa-hard-hat text-primary-500 text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-dark-800 group-hover:text-primary-600 transition">{{ $cat->name }}</div>
                                            <div class="text-[11px] text-dark-400">{{ $cat->products->count() }} sản phẩm</div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                <div class="mt-4 pt-4 border-t border-dark-100 text-center">
                                    <a href="{{ route('products.index') }}" class="text-primary-500 hover:text-primary-600 text-sm font-semibold transition">
                                        Xem tất cả sản phẩm <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('posts.index') }}"
                       class="px-4 py-2 rounded-lg text-[13px] font-semibold transition-all duration-200
                       {{ request()->routeIs('posts.*') ? 'text-primary-600 bg-primary-50' : 'text-dark-600 hover:text-primary-600 hover:bg-primary-50/60' }}">
                        Tin tức
                    </a>
                    <a href="{{ route('contact') }}"
                       class="px-4 py-2 rounded-lg text-[13px] font-semibold transition-all duration-200
                       {{ request()->routeIs('contact') ? 'text-primary-600 bg-primary-50' : 'text-dark-600 hover:text-primary-600 hover:bg-primary-50/60' }}">
                        Liên hệ
                    </a>
                </nav>

                {{-- Right Actions --}}
                <div class="flex items-center space-x-2">
                    {{-- Search --}}
                    <button @click="searchOpen = !searchOpen" class="w-10 h-10 rounded-xl text-dark-400 hover:text-primary-500 hover:bg-primary-50 flex items-center justify-center transition">
                        <i class="fas fa-search"></i>
                    </button>
                    <a href="tel:0964186111" class="hidden md:inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white text-[13px] font-bold rounded-xl transition-all shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 hover:-translate-y-0.5">
                        <i class="fas fa-phone-alt mr-2 text-xs"></i>Báo giá ngay
                    </a>
                    <button @click="mobileOpen = !mobileOpen" class="lg:hidden w-10 h-10 rounded-xl text-dark-500 hover:bg-dark-100 flex items-center justify-center transition">
                        <i class="fas" :class="mobileOpen ? 'fa-times' : 'fa-bars'" class="text-lg"></i>
                    </button>
                </div>
            </div>

            {{-- Search Overlay --}}
            <div x-show="searchOpen" x-cloak x-transition.opacity class="absolute inset-x-0 top-full bg-white border-b border-dark-100 shadow-xl py-6 px-4">
                <div class="max-w-2xl mx-auto">
                    <form action="{{ route('products.index') }}" method="GET" class="relative">
                        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm bảo hộ lao động..."
                               class="w-full px-6 py-4 bg-dark-50 border-2 border-dark-200 focus:border-primary-500 rounded-2xl text-sm focus:outline-none transition pr-14" autofocus>
                        <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-primary-500 hover:bg-primary-600 text-white rounded-xl flex items-center justify-center transition">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Mobile Nav --}}
        <div x-show="mobileOpen" x-cloak x-transition class="lg:hidden border-t border-dark-100 bg-white shadow-xl">
            <div class="px-4 py-4 space-y-1 max-h-[70vh] overflow-y-auto">
                <a href="{{ route('home') }}" class="flex items-center px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('home') ? 'text-primary-600 bg-primary-50' : 'text-dark-600 hover:bg-dark-50' }}">
                    <i class="fas fa-home w-6 text-dark-400"></i>Trang chủ
                </a>
                <a href="{{ route('about') }}" class="flex items-center px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('about') ? 'text-primary-600 bg-primary-50' : 'text-dark-600 hover:bg-dark-50' }}">
                    <i class="fas fa-info-circle w-6 text-dark-400"></i>Giới thiệu
                </a>
                <a href="{{ route('products.index') }}" class="flex items-center px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('products.*') ? 'text-primary-600 bg-primary-50' : 'text-dark-600 hover:bg-dark-50' }}">
                    <i class="fas fa-box w-6 text-dark-400"></i>Sản phẩm
                </a>
                @foreach($navCategories->take(6) as $cat)
                <a href="{{ route('products.category', $cat->slug) }}" class="flex items-center px-4 py-2.5 pl-10 rounded-xl text-sm text-dark-500 hover:text-primary-600 hover:bg-dark-50">
                    <i class="fas fa-chevron-right text-[10px] mr-2 text-dark-300"></i>{{ $cat->name }}
                </a>
                @endforeach
                <a href="{{ route('posts.index') }}" class="flex items-center px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('posts.*') ? 'text-primary-600 bg-primary-50' : 'text-dark-600 hover:bg-dark-50' }}">
                    <i class="fas fa-newspaper w-6 text-dark-400"></i>Tin tức
                </a>
                <a href="{{ route('contact') }}" class="flex items-center px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('contact') ? 'text-primary-600 bg-primary-50' : 'text-dark-600 hover:bg-dark-50' }}">
                    <i class="fas fa-envelope w-6 text-dark-400"></i>Liên hệ
                </a>
                <div class="pt-3">
                    <a href="tel:0964186111" class="flex items-center justify-center px-4 py-3 bg-gradient-to-r from-primary-500 to-primary-600 text-white font-bold rounded-xl">
                        <i class="fas fa-phone-alt mr-2"></i>0964.186.111
                    </a>
                </div>
            </div>
        </div>
    </header>

    {{-- Breadcrumb --}}
    @hasSection('breadcrumb')
    <div class="bg-dark-50/80 border-b border-dark-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5">
            @yield('breadcrumb')
        </div>
    </div>
    @endif

    <main>@yield('content')</main>

    {{-- Footer --}}
    <footer class="bg-dark-950 text-dark-400 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=40 height=40 viewBox=%220 0 40 40%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath d=%22M0 0h1v1H0z%22 fill=%22%23fff%22 fill-opacity=%22.02%22/%3E%3C/svg%3E')]"></div>
        <div class="relative">
            {{-- Newsletter --}}
            <div class="border-b border-dark-800/50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                        <div class="text-center lg:text-left">
                            <h3 class="text-2xl font-bold text-white mb-2">Nhận thông tin khuyến mãi</h3>
                            <p class="text-dark-400 text-sm">Đăng ký để nhận ưu đãi và thông tin sản phẩm mới nhất</p>
                        </div>
                        <form class="flex w-full max-w-md">
                            <input type="email" placeholder="Email của bạn..." class="flex-1 px-5 py-3.5 bg-dark-800 border border-dark-700 text-white text-sm rounded-l-xl focus:outline-none focus:border-primary-500 placeholder-dark-500 transition">
                            <button type="submit" class="px-6 py-3.5 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold text-sm rounded-r-xl transition whitespace-nowrap">
                                Đăng ký
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Main Footer --}}
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10">
                    <div class="lg:col-span-4">
                        <div class="mb-6">
                            <img src="{{ asset('images/logo.jpg') }}" alt="Lộc Thịnh" class="h-16 w-auto object-contain bg-white rounded-xl p-1.5">
                        </div>
                        <p class="text-dark-400 text-sm leading-relaxed mb-4">CÔNG TY TNHH VẬT TƯ TỔNG HỢP LỘC THỊNH</p>
                        <p class="text-dark-500 text-xs mb-1"><i class="fas fa-id-card mr-1.5 text-primary-500"></i>MST: 2301394954</p>
                        <p class="text-dark-400 text-sm leading-relaxed mb-6">Chuyên cung cấp trang thiết bị bảo hộ lao động chính hãng, chất lượng cao, đạt tiêu chuẩn an toàn quốc tế.</p>
                        <div class="flex space-x-2">
                            @foreach(['facebook-f' => 'hover:bg-blue-500', 'youtube' => 'hover:bg-red-500', 'tiktok' => 'hover:bg-pink-500', 'instagram' => 'hover:bg-purple-500'] as $icon => $color)
                            <a href="#" class="w-10 h-10 bg-dark-800 {{ $color }} rounded-xl flex items-center justify-center transition text-dark-400 hover:text-white text-sm"><i class="fab fa-{{ $icon }}"></i></a>
                            @endforeach
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <h4 class="text-white font-bold mb-5 text-sm uppercase tracking-wider">Liên kết</h4>
                        <ul class="space-y-3">
                            @foreach([['Trang chủ','home'],['Giới thiệu','about'],['Sản phẩm','products.index'],['Tin tức','posts.index'],['Liên hệ','contact']] as [$label,$route])
                            <li><a href="{{ route($route) }}" class="text-sm hover:text-primary-400 transition flex items-center group"><i class="fas fa-chevron-right mr-2 text-[9px] text-dark-600 group-hover:text-primary-500 transition"></i>{{ $label }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="lg:col-span-3">
                        <h4 class="text-white font-bold mb-5 text-sm uppercase tracking-wider">Danh mục</h4>
                        <ul class="space-y-3">
                            @foreach(\App\Models\Category::active()->parentCategories()->orderBy('sort_order')->take(6)->get() as $cat)
                            <li><a href="{{ route('products.category', $cat->slug) }}" class="text-sm hover:text-primary-400 transition flex items-center group"><i class="fas fa-chevron-right mr-2 text-[9px] text-dark-600 group-hover:text-primary-500 transition"></i>{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="lg:col-span-3">
                        <h4 class="text-white font-bold mb-5 text-sm uppercase tracking-wider">Liên hệ</h4>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <div class="w-9 h-9 bg-dark-800 rounded-lg flex items-center justify-center mr-3 mt-0.5 shrink-0"><i class="fas fa-building text-primary-500 text-xs"></i></div>
                                <div class="text-sm"><div class="text-dark-500 text-xs mb-0.5">Trụ sở</div><span>Tổ dân phố Bình Cầu, Phường Mão Điền, Tỉnh Bắc Ninh</span></div>
                            </li>
                            <li class="flex items-start">
                                <div class="w-9 h-9 bg-dark-800 rounded-lg flex items-center justify-center mr-3 mt-0.5 shrink-0"><i class="fas fa-map-marker-alt text-primary-500 text-xs"></i></div>
                                <div class="text-sm"><div class="text-dark-500 text-xs mb-0.5">VP Đại diện</div><span>074 LK KĐT HUD Trầu Cau,<br>P. Võ Cường, Bắc Ninh</span></div>
                            </li>
                            <li class="flex items-center">
                                <div class="w-9 h-9 bg-dark-800 rounded-lg flex items-center justify-center mr-3 shrink-0"><i class="fas fa-phone text-primary-500 text-xs"></i></div>
                                <div class="text-sm"><div class="text-dark-500 text-xs">Hotline</div><a href="tel:0964186111" class="text-white font-semibold hover:text-primary-400 transition">0964.186.111</a> / <a href="tel:0972998444" class="text-white font-semibold hover:text-primary-400 transition">0972.998.444</a></div>
                            </li>
                            <li class="flex items-center">
                                <div class="w-9 h-9 bg-dark-800 rounded-lg flex items-center justify-center mr-3 shrink-0"><i class="fas fa-envelope text-primary-500 text-xs"></i></div>
                                <div class="text-sm"><div class="text-dark-500 text-xs">Email</div><a href="mailto:thinhvtth.locthinh@gmail.com" class="text-white font-semibold hover:text-primary-400 transition">thinhvtth.locthinh@gmail.com</a></div>
                            </li>
                            <li class="flex items-center">
                                <div class="w-9 h-9 bg-dark-800 rounded-lg flex items-center justify-center mr-3 shrink-0"><i class="fas fa-globe text-primary-500 text-xs"></i></div>
                                <div class="text-sm"><div class="text-dark-500 text-xs">Website</div><span class="text-white font-semibold">www.locthinh.com</span></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Bottom --}}
            <div class="border-t border-dark-800/50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col md:flex-row justify-between items-center text-xs text-dark-500">
                    <p>&copy; {{ date('Y') }} Công ty TNHH Vật Tư Tổng Hợp Lộc Thịnh. All rights reserved.</p>
                    <p class="mt-2 md:mt-0">MST: 2301394954 | <span class="text-primary-500 font-semibold">www.locthinh.com</span></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Preloader
        window.addEventListener('load', () => { document.getElementById('preloader').classList.add('hidden'); });
        // Back to top
        window.addEventListener('scroll', () => { document.getElementById('backToTop').style.display = window.scrollY > 300 ? 'flex' : 'none'; });
        // Animate on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('animate-slide-up'); e.target.style.opacity = 1; observer.unobserve(e.target); } });
        }, { threshold: 0.1 });
        document.querySelectorAll('.animate-on-scroll').forEach(el => { el.style.opacity = 0; observer.observe(el); });
    </script>
    @stack('scripts')
</body>
</html>
