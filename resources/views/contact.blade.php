@extends('layouts.app')

@section('title', 'Liên hệ - Bảo Hộ Lao Động')

@section('breadcrumb')
<nav class="flex text-sm" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-2">
        <li><a href="{{ route('home') }}" class="text-secondary-500 hover:text-primary-500 transition"><i class="fas fa-home"></i></a></li>
        <li class="text-secondary-300">/</li>
        <li class="text-secondary-800 font-medium">Liên hệ</li>
    </ol>
</nav>
@endsection

@section('content')
<section class="py-10 lg:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-3xl lg:text-4xl font-extrabold text-secondary-900 mb-3">Liên hệ với chúng tôi</h1>
            <p class="text-secondary-500 max-w-2xl mx-auto">Hãy liên hệ nếu bạn cần tư vấn hoặc có bất kỳ câu hỏi nào. Chúng tôi luôn sẵn sàng hỗ trợ.</p>
        </div>

        @if(session('success'))
        <div class="mb-8 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl flex items-center" x-data="{ show: true }" x-show="show">
            <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
            <span class="flex-1 font-medium">{{ session('success') }}</span>
            <button @click="show = false" class="text-green-400 hover:text-green-600"><i class="fas fa-times"></i></button>
        </div>
        @endif

        <div class="grid lg:grid-cols-3 gap-8">
            {{-- Contact Info --}}
            <div class="space-y-6">
                @foreach([
                    ['icon' => 'fa-building', 'bg' => 'bg-blue-50', 'iconColor' => 'text-blue-500', 'title' => 'Công ty', 'content' => 'CÔNG TY TNHH VẬT TƯ TỔNG HỢP LỘC THỊNH (MST: 2301394954)'],
                    ['icon' => 'fa-map-marker-alt', 'bg' => 'bg-indigo-50', 'iconColor' => 'text-indigo-500', 'title' => 'VP Đại diện', 'content' => '074 LK KĐT HUD Trầu Cau, P. Võ Cường, Tỉnh Bắc Ninh'],
                    ['icon' => 'fa-phone-alt', 'bg' => 'bg-green-50', 'iconColor' => 'text-green-500', 'title' => 'Điện thoại', 'content' => '0964.186.111 / 0972.998.444', 'link' => 'tel:0964186111'],
                    ['icon' => 'fa-envelope', 'bg' => 'bg-primary-50', 'iconColor' => 'text-primary-500', 'title' => 'Email', 'content' => 'thinhvtth.locthinh@gmail.com', 'link' => 'mailto:thinhvtth.locthinh@gmail.com'],
                    ['icon' => 'fa-globe', 'bg' => 'bg-cyan-50', 'iconColor' => 'text-cyan-500', 'title' => 'Website', 'content' => 'www.locthinh.com'],
                    ['icon' => 'fa-clock', 'bg' => 'bg-purple-50', 'iconColor' => 'text-purple-500', 'title' => 'Giờ làm việc', 'content' => 'Thứ 2 - Thứ 7: 8:00 - 17:30'],
                ] as $info)
                <div class="bg-white rounded-2xl border border-secondary-100 p-6 flex items-start space-x-4 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 {{ $info['bg'] }} rounded-xl flex items-center justify-center shrink-0">
                        <i class="fas {{ $info['icon'] }} {{ $info['iconColor'] }} text-lg"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-secondary-800 mb-1">{{ $info['title'] }}</h3>
                        @if(isset($info['link']))
                            <a href="{{ $info['link'] }}" class="text-secondary-500 hover:text-primary-500 transition text-sm">{{ $info['content'] }}</a>
                        @else
                            <p class="text-secondary-500 text-sm">{{ $info['content'] }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Form --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl border border-secondary-100 p-6 lg:p-10">
                    <h2 class="text-xl font-bold text-secondary-900 mb-6">Gửi tin nhắn</h2>
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-secondary-700 mb-1.5">Họ tên <span class="text-red-500">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                    class="w-full px-4 py-3 bg-secondary-50 border border-secondary-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition @error('name') border-red-300 @enderror">
                                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-secondary-700 mb-1.5">Email <span class="text-red-500">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class="w-full px-4 py-3 bg-secondary-50 border border-secondary-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition @error('email') border-red-300 @enderror">
                                @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-secondary-700 mb-1.5">Số điện thoại</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                    class="w-full px-4 py-3 bg-secondary-50 border border-secondary-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-secondary-700 mb-1.5">Tiêu đề</label>
                                <input type="text" name="subject" value="{{ old('subject') }}"
                                    class="w-full px-4 py-3 bg-secondary-50 border border-secondary-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-secondary-700 mb-1.5">Nội dung <span class="text-red-500">*</span></label>
                            <textarea name="message" rows="5" required
                                class="w-full px-4 py-3 bg-secondary-50 border border-secondary-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition resize-none @error('message') border-red-300 @enderror">{{ old('message') }}</textarea>
                            @error('message')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="inline-flex items-center px-8 py-4 bg-primary-500 hover:bg-primary-600 text-white font-bold rounded-xl transition shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40">
                            <i class="fas fa-paper-plane mr-2"></i>Gửi tin nhắn
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
