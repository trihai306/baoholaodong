@extends('layouts.app')

@section('title', 'Giới thiệu - Bảo Hộ Lao Động')
@section('meta_description', 'Giới thiệu ' . ($setting['company_name'] ?? 'Công ty TNHH Vật Tư Tổng Hợp Lộc Thịnh') . ' - Đơn vị chuyên cung cấp trang thiết bị bảo hộ lao động chính hãng, đạt tiêu chuẩn an toàn quốc tế tại ' . ($setting['address_city'] ?? 'Bắc Ninh') . '.')
@section('canonical', route('about'))

@section('breadcrumb')
<nav class="flex text-sm" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-2">
        <li><a href="{{ route('home') }}" class="text-dark-500 hover:text-primary-500 transition"><i class="fas fa-home"></i></a></li>
        <li class="text-dark-300">/</li>
        <li class="text-dark-800 font-medium">Giới thiệu</li>
    </ol>
</nav>
@endsection

@section('content')
    {{-- Hero --}}
    <section class="py-16 lg:py-24 bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                <div>
                    <div class="inline-flex items-center px-4 py-2 bg-primary-50 text-primary-600 text-sm font-medium rounded-full mb-6 border border-primary-100">
                        <i class="fas fa-info-circle mr-2"></i>Về chúng tôi
                    </div>
                    <h1 class="text-3xl lg:text-5xl font-extrabold text-dark-900 leading-tight mb-6">
                        Công Ty TNHH Vật Tư<br>
                        <span class="gradient-text">Tổng Hợp Lộc Thịnh</span>
                    </h1>
                    <p class="text-dark-400 text-sm mb-4"><i class="fas fa-id-card mr-1.5"></i>MST: {{ $setting['tax_code'] ?? '2301394954' }} | Giám đốc: {{ $setting['director_name'] ?? 'Đỗ Quang Thịnh' }}</p>
                    <p class="text-dark-500 text-lg leading-relaxed mb-6">
                        {{ $setting['company_name'] ?? 'Công ty TNHH Vật Tư Tổng Hợp Lộc Thịnh' }} chuyên cung cấp trang thiết bị bảo hộ lao động chính hãng, chất lượng cao, phục vụ các doanh nghiệp trên toàn quốc.
                    </p>
                    <p class="text-dark-500 leading-relaxed mb-8">
                        Chúng tôi cung cấp đầy đủ các sản phẩm bảo hộ lao động bao gồm: mũ bảo hộ, kính bảo hộ, găng tay, giày bảo hộ, quần áo bảo hộ, khẩu trang, dây đai an toàn và nhiều thiết bị bảo hộ khác cho mọi ngành nghề.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach(['Sản phẩm chính hãng', 'Giá cả hợp lý', 'Giao hàng toàn quốc', 'Bảo hành chu đáo'] as $item)
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 bg-green-50 rounded-full flex items-center justify-center shrink-0">
                                <i class="fas fa-check text-green-500 text-xs"></i>
                            </div>
                            <span class="text-sm font-medium text-dark-700">{{ $item }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-12 lg:mt-0">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-br from-primary-500/10 to-primary-600/10 rounded-3xl blur-2xl"></div>
                        <div class="relative bg-dark-800 rounded-3xl p-10 lg:p-14 text-center shadow-lg">
                            <i class="fas fa-hard-hat text-7xl text-primary-400/60 mb-6"></i>
                            <h3 class="text-2xl font-bold text-white mb-3">An toàn là trên hết</h3>
                            <p class="text-dark-400">Bảo vệ người lao động - Bảo vệ tương lai</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach([
                    ['icon' => 'fa-users', 'number' => '5,000+', 'label' => 'Khách hàng tin dùng', 'color' => 'from-blue-500 to-cyan-500'],
                    ['icon' => 'fa-box', 'number' => '1,000+', 'label' => 'Sản phẩm đa dạng', 'color' => 'from-green-500 to-emerald-500'],
                    ['icon' => 'fa-award', 'number' => '10+', 'label' => 'Năm kinh nghiệm', 'color' => 'from-primary-500 to-orange-500'],
                    ['icon' => 'fa-handshake', 'number' => '50+', 'label' => 'Đối tác thương hiệu', 'color' => 'from-purple-500 to-pink-500'],
                ] as $stat)
                <div class="bg-gray-50 rounded-2xl p-6 lg:p-8 text-center border border-dark-100 hover:shadow-md transition">
                    <div class="w-14 h-14 mx-auto mb-4 bg-white rounded-xl flex items-center justify-center border border-dark-100">
                        <i class="fas {{ $stat['icon'] }} text-primary-500 text-xl"></i>
                    </div>
                    <div class="text-3xl font-extrabold text-dark-900 mb-1">{{ $stat['number'] }}</div>
                    <div class="text-sm text-dark-500">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Values --}}
    <section class="py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-dark-900 mb-3">Giá trị cốt lõi</h2>
                <p class="text-dark-500 max-w-2xl mx-auto">Những cam kết mà chúng tôi luôn tuân thủ trong suốt quá trình hoạt động</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['icon' => 'fa-gem', 'color' => 'text-blue-500 bg-blue-50', 'title' => 'Chất lượng', 'desc' => 'Chỉ phân phối sản phẩm chính hãng, đạt các tiêu chuẩn an toàn quốc tế như EN, ANSI, ISO.'],
                    ['icon' => 'fa-heart', 'color' => 'text-red-500 bg-red-50', 'title' => 'Tận tâm', 'desc' => 'Đặt sự hài lòng của khách hàng lên hàng đầu, luôn lắng nghe và tư vấn tận tình.'],
                    ['icon' => 'fa-rocket', 'color' => 'text-primary-500 bg-primary-50', 'title' => 'Đổi mới', 'desc' => 'Không ngừng cập nhật sản phẩm mới, công nghệ mới để mang đến giải pháp tốt nhất.'],
                ] as $value)
                <div class="text-center p-8 rounded-2xl border border-dark-100 hover:shadow-md transition-all hover:-translate-y-1">
                    <div class="w-16 h-16 mx-auto mb-5 {{ $value['color'] }} rounded-2xl flex items-center justify-center">
                        <i class="fas {{ $value['icon'] }} text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark-900 mb-3">{{ $value['title'] }}</h3>
                    <p class="text-dark-500 leading-relaxed">{{ $value['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-primary-500">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-white mb-4">Hợp tác cùng chúng tôi</h2>
            <p class="text-white/80 text-lg mb-8">Liên hệ ngay để được tư vấn giải pháp bảo hộ lao động phù hợp cho doanh nghiệp của bạn.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="tel:{{ $setting['phone_primary'] ?? '0964186111' }}" class="inline-flex items-center px-8 py-4 bg-white text-primary-600 font-bold rounded-xl hover:bg-primary-50 transition shadow-xl">
                    <i class="fas fa-phone-alt mr-2"></i>{{ $setting['phone_primary_display'] ?? '0964.186.111' }}
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-primary-700 text-white font-semibold rounded-xl hover:bg-primary-800 transition border border-primary-400">
                    <i class="fas fa-envelope mr-2"></i>Gửi yêu cầu
                </a>
            </div>
        </div>
    </section>
@endsection
