@extends('layouts.app')

@section('title', 'Bảo Hộ Lao Động - Trang Thiết Bị An Toàn Chất Lượng Cao')
@section('meta_description', ($setting['company_short_name'] ?? 'Lộc Thịnh') . ' - Đơn vị uy tín #1 cung cấp trang thiết bị bảo hộ lao động chất lượng cao: mũ bảo hộ, kính bảo hộ, găng tay, giày bảo hộ, quần áo bảo hộ. Hotline: ' . ($setting['phone_primary_display'] ?? '0964.186.111'))
@section('canonical', route('home'))

@section('content')
    {{-- Hero Section --}}
    <section class="relative bg-dark-950 overflow-hidden min-h-[600px] lg:min-h-[700px] flex items-center">
        {{-- Animated background --}}
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-dark-900 via-dark-950 to-dark-900"></div>
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-primary-500/5 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-blue-500/5 rounded-full blur-[100px]"></div>
            <div class="absolute inset-0" style="background-image: radial-gradient(rgba(255,255,255,.03) 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-0 w-full">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="animate-fade-in">
                    <div class="inline-flex items-center px-4 py-2 glass text-primary-400 text-xs font-semibold rounded-full mb-8 tracking-wide uppercase">
                        <span class="w-2 h-2 bg-primary-500 rounded-full mr-2 animate-pulse"></span>
                        Đơn vị uy tín #1 Việt Nam
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-[3.5rem] xl:text-6xl font-black text-white leading-[1.1] mb-6 tracking-tight">
                        Trang Thiết Bị<br>
                        <span class="gradient-text">Bảo Hộ Lao Động</span><br>
                        <span class="text-dark-300 text-3xl sm:text-4xl lg:text-[2.5rem]">Chất Lượng Quốc Tế</span>
                    </h1>
                    <p class="text-lg text-dark-400 mb-10 max-w-lg leading-relaxed">
                        Cung cấp <strong class="text-dark-200">1,000+ sản phẩm</strong> bảo hộ chính hãng từ các thương hiệu hàng đầu thế giới. Phục vụ <strong class="text-dark-200">5,000+ doanh nghiệp</strong> trên toàn quốc.
                    </p>
                    <div class="flex flex-wrap gap-4 mb-10">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold rounded-2xl transition-all shadow-xl shadow-primary-500/25 hover:shadow-primary-500/40 hover:-translate-y-1 text-sm">
                            <i class="fas fa-shopping-bag mr-2.5"></i>Xem sản phẩm
                        </a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 glass text-white font-bold rounded-2xl transition-all hover:bg-white/10 text-sm">
                            <i class="fas fa-headset mr-2.5"></i>Tư vấn miễn phí
                        </a>
                    </div>
                    {{-- Trust badges --}}
                    <div class="flex items-center space-x-6 text-dark-500 text-xs">
                        @foreach(['Miễn phí vận chuyển', 'Bảo hành chính hãng', 'Đổi trả 30 ngày'] as $badge)
                        <div class="flex items-center"><i class="fas fa-check-circle text-primary-500 mr-1.5"></i>{{ $badge }}</div>
                        @endforeach
                    </div>
                </div>
                <div class="hidden lg:block relative">
                    <div class="relative">
                        {{-- Floating cards --}}
                        <div class="absolute -top-6 -left-6 glass rounded-2xl p-5 animate-float z-10 shadow-xl">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center"><i class="fas fa-shield-alt text-green-400 text-xl"></i></div>
                                <div><div class="text-white font-bold text-sm">An Toàn 100%</div><div class="text-dark-400 text-xs">Tiêu chuẩn quốc tế</div></div>
                            </div>
                        </div>
                        <div class="absolute -bottom-4 -right-4 glass rounded-2xl p-5 animate-float-delay z-10 shadow-xl">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-primary-500/20 rounded-xl flex items-center justify-center"><i class="fas fa-truck text-primary-400 text-xl"></i></div>
                                <div><div class="text-white font-bold text-sm">Giao Nhanh</div><div class="text-dark-400 text-xs">Toàn quốc 2-5 ngày</div></div>
                            </div>
                        </div>
                        {{-- Main grid --}}
                        <div class="grid grid-cols-2 gap-5">
                            @foreach([
                                ['icon' => 'fa-hard-hat', 'name' => 'Mũ bảo hộ', 'count' => '50+'],
                                ['icon' => 'fa-glasses', 'name' => 'Kính bảo hộ', 'count' => '30+'],
                                ['icon' => 'fa-mitten', 'name' => 'Găng tay', 'count' => '80+'],
                                ['icon' => 'fa-shoe-prints', 'name' => 'Giày bảo hộ', 'count' => '60+'],
                            ] as $i => $item)
                            <div class="glass rounded-2xl p-6 text-center hover:bg-white/10 transition-all {{ $i % 2 == 1 ? 'mt-8' : '' }}">
                                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-primary-500/20 to-primary-600/20 rounded-2xl flex items-center justify-center">
                                    <i class="fas {{ $item['icon'] }} text-primary-400 text-2xl"></i>
                                </div>
                                <div class="text-white font-bold text-sm">{{ $item['name'] }}</div>
                                <div class="text-dark-500 text-xs mt-1">{{ $item['count'] }} mẫu</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="py-6 bg-white border-b border-dark-100"
             x-data="{ show: false, counts: [0,0,0,0], targets: [5000,1000,10,50], done: false }"
             x-intersect.once="show = true; if(!done){ done=true; targets.forEach((t,i)=>{ let step=Math.max(1,Math.floor(t/40)); let c=0; let iv=setInterval(()=>{ c+=step; if(c>=t){c=t;clearInterval(iv)} counts[i]=c; },30); }); }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 divide-x divide-dark-100">
                @foreach([
                    ['icon' => 'fa-users', 'idx' => 0, 'suffix' => '+', 'label' => 'Khách hàng tin dùng', 'color' => 'text-primary-500'],
                    ['icon' => 'fa-box', 'idx' => 1, 'suffix' => '+', 'label' => 'Sản phẩm đa dạng', 'color' => 'text-primary-500'],
                    ['icon' => 'fa-award', 'idx' => 2, 'suffix' => '+', 'label' => 'Năm kinh nghiệm', 'color' => 'text-primary-500'],
                    ['icon' => 'fa-handshake', 'idx' => 3, 'suffix' => '+', 'label' => 'Đối tác thương hiệu', 'color' => 'text-primary-500'],
                ] as $stat)
                <div class="flex items-center justify-center gap-4 py-6 px-4">
                    <i class="fas {{ $stat['icon'] }} text-2xl {{ $stat['color'] }}"></i>
                    <div>
                        <div class="text-2xl lg:text-3xl font-black text-dark-900 leading-none tabular-nums">
                            <span x-text="counts[{{ $stat['idx'] }}].toLocaleString()">0</span><span class="text-primary-500">{{ $stat['suffix'] }}</span>
                        </div>
                        <div class="text-xs text-dark-400 mt-0.5">{{ $stat['label'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Categories --}}
    @if($categories->count())
    <section class="py-16 lg:py-20 bg-dark-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14 animate-on-scroll">
                <div class="inline-flex items-center px-4 py-1.5 bg-primary-50 text-primary-600 text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Danh mục</div>
                <h2 class="text-3xl lg:text-4xl font-black text-dark-900 mb-3">Sản phẩm đa dạng</h2>
                <p class="text-dark-500 max-w-2xl mx-auto">Đầy đủ trang thiết bị bảo hộ cho mọi ngành nghề, đạt chuẩn quốc tế</p>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6">
                @foreach($categories as $category)
                <a href="{{ route('products.category', $category->slug) }}" class="group animate-on-scroll">
                    <div class="bg-white rounded-2xl p-6 lg:p-8 text-center border border-dark-100 card-hover h-full">
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" class="w-16 h-16 mx-auto mb-4 object-contain" alt="{{ $category->name }}">
                        @else
                            <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-primary-50 to-primary-100 group-hover:from-primary-100 group-hover:to-primary-200 rounded-2xl flex items-center justify-center transition-colors">
                                <i class="fas fa-hard-hat text-2xl text-primary-500"></i>
                            </div>
                        @endif
                        <h3 class="font-bold text-dark-800 group-hover:text-primary-600 transition text-sm lg:text-base">{{ $category->name }}</h3>
                        <p class="text-xs text-dark-400 mt-1.5">{{ $category->products->count() }} sản phẩm</p>
                        <div class="mt-3 text-primary-500 text-xs font-semibold opacity-0 group-hover:opacity-100 transition">
                            Xem ngay <i class="fas fa-arrow-right ml-1"></i>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Featured Products Slider --}}
    @if($featuredProducts->count())
    <section class="py-16 lg:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-10 animate-on-scroll">
                <div>
                    <div class="inline-flex items-center px-4 py-1.5 bg-red-50 text-red-500 text-xs font-semibold rounded-full mb-4 uppercase tracking-wider"><i class="fas fa-fire mr-1.5"></i>Hot</div>
                    <h2 class="text-3xl lg:text-4xl font-black text-dark-900 mb-2">Sản phẩm nổi bật</h2>
                    <p class="text-dark-500">Được khách hàng tin dùng và đánh giá cao nhất</p>
                </div>
                <a href="{{ route('products.index') }}" class="mt-4 sm:mt-0 inline-flex items-center px-5 py-2.5 bg-dark-900 hover:bg-primary-500 text-white text-sm font-semibold rounded-xl transition-all">
                    Xem tất cả <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>
            <div class="swiper featuredSwiper">
                <div class="swiper-wrapper pb-4">
                    @foreach($featuredProducts as $product)
                    <div class="swiper-slide">
                        @include('products._card', ['product' => $product])
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination !-bottom-2 mt-6"></div>
            </div>
        </div>
    </section>
    @endif

    {{-- Why Choose Us --}}
    <section class="py-20 lg:py-28 bg-dark-950 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-primary-500/5 rounded-full blur-[150px]"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <div class="inline-flex items-center px-4 py-1.5 bg-white/5 border border-white/10 text-primary-400 text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Uy tín</div>
                <h2 class="text-3xl lg:text-4xl font-black text-white mb-3">Tại sao chọn chúng tôi?</h2>
                <p class="text-dark-400 max-w-2xl mx-auto">Cam kết mang đến sản phẩm tốt nhất với dịch vụ hoàn hảo nhất</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach([
                    ['icon' => 'fa-certificate', 'gradient' => 'from-yellow-400 to-orange-500', 'shadow' => 'shadow-orange-500/20', 'title' => 'Chất lượng đảm bảo', 'desc' => 'Sản phẩm chính hãng 100%, đạt tiêu chuẩn EN, ANSI, ISO quốc tế'],
                    ['icon' => 'fa-tags', 'gradient' => 'from-green-400 to-emerald-500', 'shadow' => 'shadow-green-500/20', 'title' => 'Giá tốt nhất', 'desc' => 'Cam kết giá cạnh tranh, chiết khấu lớn cho đơn hàng số lượng'],
                    ['icon' => 'fa-shipping-fast', 'gradient' => 'from-blue-400 to-cyan-500', 'shadow' => 'shadow-blue-500/20', 'title' => 'Giao hàng nhanh', 'desc' => 'Miễn phí nội thành, giao toàn quốc chỉ 2-5 ngày làm việc'],
                    ['icon' => 'fa-headset', 'gradient' => 'from-purple-400 to-pink-500', 'shadow' => 'shadow-purple-500/20', 'title' => 'Hỗ trợ 24/7', 'desc' => 'Đội ngũ chuyên gia tư vấn nhiệt tình, sẵn sàng hỗ trợ mọi lúc'],
                ] as $feature)
                <div class="glass rounded-2xl p-8 text-center hover:bg-white/10 transition-all duration-300 group animate-on-scroll card-hover">
                    <div class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br {{ $feature['gradient'] }} rounded-2xl flex items-center justify-center shadow-lg {{ $feature['shadow'] }} group-hover:scale-110 transition-transform">
                        <i class="fas {{ $feature['icon'] }} text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-3">{{ $feature['title'] }}</h3>
                    <p class="text-dark-400 text-sm leading-relaxed">{{ $feature['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Latest Products --}}
    @if($latestProducts->count())
    <section class="py-16 lg:py-20 bg-dark-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-10 animate-on-scroll">
                <div>
                    <div class="inline-flex items-center px-4 py-1.5 bg-blue-50 text-blue-500 text-xs font-semibold rounded-full mb-4 uppercase tracking-wider"><i class="fas fa-bolt mr-1.5"></i>Mới nhất</div>
                    <h2 class="text-3xl lg:text-4xl font-black text-dark-900 mb-2">Sản phẩm mới</h2>
                    <p class="text-dark-500">Cập nhật các sản phẩm bảo hộ mới nhất trên thị trường</p>
                </div>
                <a href="{{ route('products.index') }}" class="mt-4 sm:mt-0 inline-flex items-center px-5 py-2.5 bg-dark-900 hover:bg-primary-500 text-white text-sm font-semibold rounded-xl transition-all">
                    Xem tất cả <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6">
                @foreach($latestProducts as $product)
                <div class="animate-on-scroll">@include('products._card', ['product' => $product])</div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Testimonials --}}
    <section class="py-16 lg:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14 animate-on-scroll">
                <div class="inline-flex items-center px-4 py-1.5 bg-primary-50 text-primary-600 text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Đánh giá</div>
                <h2 class="text-3xl lg:text-4xl font-black text-dark-900 mb-3">Khách hàng nói gì?</h2>
                <p class="text-dark-500">Những phản hồi từ khách hàng đã sử dụng sản phẩm của chúng tôi</p>
            </div>
            <div class="swiper testimonialSwiper">
                <div class="swiper-wrapper pb-10">
                    @foreach([
                        ['name' => 'Nguyễn Văn A', 'role' => 'Giám đốc Cty XD Thành Đạt', 'text' => 'Sản phẩm bảo hộ chất lượng tuyệt vời, giá cả hợp lý. Đã hợp tác hơn 3 năm và rất hài lòng với dịch vụ.', 'rating' => 5],
                        ['name' => 'Trần Thị B', 'role' => 'Quản lý An toàn - Nhà máy ABC', 'text' => 'Đội ngũ tư vấn nhiệt tình, giao hàng đúng hẹn. Các sản phẩm đều đạt tiêu chuẩn an toàn quốc tế.', 'rating' => 5],
                        ['name' => 'Lê Văn C', 'role' => 'Chủ cửa hàng BHLD Miền Nam', 'text' => 'Nguồn hàng phong phú, giá sỉ cạnh tranh. Hỗ trợ đổi trả nhanh chóng khi có vấn đề.', 'rating' => 5],
                    ] as $review)
                    <div class="swiper-slide">
                        <div class="bg-dark-50 rounded-2xl p-8 h-full border border-dark-100">
                            <div class="flex mb-4">
                                @for($i = 0; $i < $review['rating']; $i++)
                                <i class="fas fa-star text-yellow-400 text-sm mr-0.5"></i>
                                @endfor
                            </div>
                            <p class="text-dark-600 leading-relaxed mb-6 italic">"{{ $review['text'] }}"</p>
                            <div class="flex items-center">
                                <div class="w-11 h-11 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center text-white font-bold text-sm mr-4">
                                    {{ mb_substr($review['name'], 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-bold text-dark-900 text-sm">{{ $review['name'] }}</div>
                                    <div class="text-dark-500 text-xs">{{ $review['role'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    {{-- Latest Posts --}}
    @if($latestPosts->count())
    <section class="py-16 lg:py-20 bg-dark-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14 animate-on-scroll">
                <div class="inline-flex items-center px-4 py-1.5 bg-blue-50 text-blue-500 text-xs font-semibold rounded-full mb-4 uppercase tracking-wider">Blog</div>
                <h2 class="text-3xl lg:text-4xl font-black text-dark-900 mb-3">Tin tức & Kiến thức</h2>
                <p class="text-dark-500">Cập nhật thông tin mới nhất về an toàn lao động</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($latestPosts as $post)
                <article class="animate-on-scroll">
                    <div class="bg-white rounded-2xl overflow-hidden border border-dark-100 card-hover h-full flex flex-col group">
                        <div class="aspect-video overflow-hidden relative">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $post->title }}">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-dark-100 to-dark-200 flex items-center justify-center">
                                    <i class="fas fa-newspaper text-4xl text-dark-300"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-dark-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        <div class="p-5 flex flex-col flex-1">
                            <div class="flex items-center gap-3 text-xs text-dark-400 mb-3">
                                <span><i class="far fa-calendar mr-1"></i>{{ $post->created_at->format('d/m/Y') }}</span>
                                <span class="inline-flex items-center px-2 py-0.5 bg-primary-50 text-primary-600 rounded-full font-medium">{{ $post->type == 'news' ? 'Tin tức' : 'Blog' }}</span>
                            </div>
                            <h3 class="font-bold text-dark-800 group-hover:text-primary-600 transition line-clamp-2 text-sm mb-auto">
                                <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <a href="{{ route('posts.show', $post->slug) }}" class="mt-4 inline-flex items-center text-primary-500 hover:text-primary-600 text-xs font-semibold transition">
                                Đọc tiếp <i class="fas fa-arrow-right ml-1.5 text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section class="py-20 lg:py-24 bg-gradient-to-br from-primary-500 via-primary-600 to-primary-700 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full blur-[80px]"></div>
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center px-4 py-1.5 bg-white/10 text-white text-xs font-semibold rounded-full mb-6 uppercase tracking-wider border border-white/20">
                <i class="fas fa-phone-alt mr-2"></i>Liên hệ ngay
            </div>
            <h2 class="text-3xl lg:text-5xl font-black text-white mb-5 leading-tight">Cần báo giá <br class="sm:hidden">trang thiết bị bảo hộ?</h2>
            <p class="text-primary-100 text-lg mb-10 max-w-2xl mx-auto leading-relaxed">Gọi ngay cho chúng tôi để được tư vấn miễn phí và nhận báo giá tốt nhất trong vòng 30 phút.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="tel:{{ $setting['phone_primary'] ?? '0964186111' }}" class="inline-flex items-center px-10 py-5 bg-white text-primary-600 font-black rounded-2xl hover:bg-primary-50 transition shadow-2xl text-lg">
                    <i class="fas fa-phone-alt mr-3"></i>{{ $setting['phone_primary_display'] ?? '0964.186.111' }}
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center px-10 py-5 bg-white/10 text-white font-bold rounded-2xl hover:bg-white/20 transition border-2 border-white/20 text-lg">
                    <i class="fas fa-envelope mr-3"></i>Gửi yêu cầu
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    new Swiper('.featuredSwiper', {
        slidesPerView: 2,
        spaceBetween: 16,
        pagination: { el: '.featuredSwiper .swiper-pagination', clickable: true },
        breakpoints: { 640: { slidesPerView: 3 }, 1024: { slidesPerView: 4, spaceBetween: 24 } }
    });
    new Swiper('.testimonialSwiper', {
        slidesPerView: 1,
        spaceBetween: 24,
        pagination: { el: '.testimonialSwiper .swiper-pagination', clickable: true },
        autoplay: { delay: 5000, disableOnInteraction: false },
        breakpoints: { 640: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
    });
</script>
@endpush
