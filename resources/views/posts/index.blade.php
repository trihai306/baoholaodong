@extends('layouts.app')

@section('title', 'Tin tức & Kiến thức - Bảo Hộ Lao Động')
@section('meta_description', 'Tin tức, kiến thức về bảo hộ lao động, an toàn lao động. Hướng dẫn chọn mua và sử dụng trang thiết bị bảo hộ đúng chuẩn từ Lộc Thịnh.')
@section('canonical', route('posts.index'))

@section('breadcrumb')
<nav class="flex text-sm" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-2">
        <li><a href="{{ route('home') }}" class="text-secondary-500 hover:text-primary-500 transition"><i class="fas fa-home"></i></a></li>
        <li class="text-secondary-300">/</li>
        <li class="text-secondary-800 font-medium">Tin tức</li>
    </ol>
</nav>
@endsection

@section('content')
<section class="py-10 lg:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-3xl lg:text-4xl font-extrabold text-secondary-900 mb-3">Tin tức & Kiến thức</h1>
            <p class="text-secondary-500 max-w-2xl mx-auto">Cập nhật thông tin mới nhất về bảo hộ lao động và an toàn lao động</p>
        </div>

        @if($posts->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach($posts as $post)
            <article class="bg-white rounded-2xl overflow-hidden border border-secondary-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group flex flex-col">
                <div class="aspect-video overflow-hidden">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $post->title }}" loading="lazy">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-secondary-100 to-secondary-200 flex items-center justify-center">
                            <i class="fas fa-newspaper text-5xl text-secondary-300"></i>
                        </div>
                    @endif
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-center gap-4 text-xs text-secondary-400 mb-3">
                        <span><i class="far fa-calendar mr-1"></i>{{ $post->created_at->format('d/m/Y') }}</span>
                        <span><i class="far fa-eye mr-1"></i>{{ $post->view_count }}</span>
                        <span class="inline-flex items-center px-2 py-0.5 bg-primary-50 text-primary-600 rounded-full font-medium">{{ $post->type == 'news' ? 'Tin tức' : 'Blog' }}</span>
                    </div>
                    <h2 class="text-lg font-bold text-secondary-800 group-hover:text-primary-600 transition line-clamp-2 mb-3">
                        <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                    </h2>
                    @if($post->excerpt)
                        <p class="text-secondary-500 text-sm line-clamp-3 mb-4">{{ $post->excerpt }}</p>
                    @endif
                    <a href="{{ route('posts.show', $post->slug) }}" class="mt-auto inline-flex items-center text-primary-500 hover:text-primary-600 text-sm font-semibold transition">
                        Đọc tiếp <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
        <div class="mt-10">{{ $posts->links() }}</div>
        @else
        <div class="text-center py-20 bg-white rounded-2xl border border-secondary-100">
            <i class="fas fa-newspaper text-5xl text-secondary-200 mb-4"></i>
            <p class="text-secondary-500 text-lg">Chưa có bài viết nào.</p>
        </div>
        @endif
    </div>
</section>
@endsection
