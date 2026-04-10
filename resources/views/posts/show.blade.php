@extends('layouts.app')

@section('title', $post->title . ' - Bảo Hộ Lao Động')

@section('breadcrumb')
<nav class="flex text-sm" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-2">
        <li><a href="{{ route('home') }}" class="text-secondary-500 hover:text-primary-500 transition"><i class="fas fa-home"></i></a></li>
        <li class="text-secondary-300">/</li>
        <li><a href="{{ route('posts.index') }}" class="text-secondary-500 hover:text-primary-500 transition">Tin tức</a></li>
        <li class="text-secondary-300">/</li>
        <li class="text-secondary-800 font-medium truncate max-w-[200px]">{{ $post->title }}</li>
    </ol>
</nav>
@endsection

@section('content')
<section class="py-10 lg:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-3 lg:gap-10">
            <article class="lg:col-span-2">
                <div class="bg-white rounded-2xl border border-secondary-100 overflow-hidden">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-full aspect-video object-cover" alt="{{ $post->title }}">
                    @endif
                    <div class="p-6 lg:p-10">
                        <div class="flex flex-wrap items-center gap-4 text-sm text-secondary-400 mb-5">
                            <span><i class="far fa-calendar mr-1.5"></i>{{ $post->created_at->format('d/m/Y') }}</span>
                            <span><i class="far fa-eye mr-1.5"></i>{{ $post->view_count }} lượt xem</span>
                            <span><i class="far fa-user mr-1.5"></i>{{ $post->user->name ?? 'Admin' }}</span>
                        </div>
                        <h1 class="text-2xl lg:text-3xl font-extrabold text-secondary-900 mb-8 leading-tight">{{ $post->title }}</h1>
                        <div class="prose prose-sm lg:prose-base max-w-none text-secondary-700 prose-headings:text-secondary-900 prose-a:text-primary-500">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
            </article>

            <aside class="lg:col-span-1 mt-8 lg:mt-0">
                @if($relatedPosts->count())
                <div class="bg-white rounded-2xl border border-secondary-100 overflow-hidden sticky top-28">
                    <div class="px-6 py-4 border-b border-secondary-100">
                        <h3 class="font-bold text-secondary-900">Bài viết liên quan</h3>
                    </div>
                    <div class="divide-y divide-secondary-50">
                        @foreach($relatedPosts as $related)
                        <a href="{{ route('posts.show', $related->slug) }}" class="block p-5 hover:bg-secondary-50 transition group">
                            <div class="text-xs text-secondary-400 mb-1"><i class="far fa-calendar mr-1"></i>{{ $related->created_at->format('d/m/Y') }}</div>
                            <h4 class="text-sm font-semibold text-secondary-700 group-hover:text-primary-600 transition line-clamp-2">{{ $related->title }}</h4>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </aside>
        </div>
    </div>
</section>
@endsection
