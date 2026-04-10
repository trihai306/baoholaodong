<div class="group h-full">
    <div class="bg-white rounded-2xl overflow-hidden border border-dark-100 card-hover h-full flex flex-col">
        <a href="{{ route('products.show', $product->slug) }}" class="block aspect-square overflow-hidden relative">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $product->name }}">
            @else
                <div class="w-full h-full bg-gradient-to-br from-dark-50 to-dark-100 flex items-center justify-center">
                    <i class="fas fa-image text-4xl text-dark-200"></i>
                </div>
            @endif
            {{-- Overlay --}}
            <div class="absolute inset-0 bg-gradient-to-t from-dark-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end justify-center pb-4">
                <span class="inline-flex items-center px-5 py-2.5 bg-white text-dark-800 text-xs font-bold rounded-xl shadow-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                    <i class="fas fa-eye mr-1.5"></i>Xem chi tiết
                </span>
            </div>
            {{-- Badges --}}
            <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                @if($product->sale_price)
                <span class="inline-flex items-center px-2.5 py-1 bg-red-500 text-white text-[10px] font-bold rounded-lg shadow-lg shadow-red-500/30">
                    -{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%
                </span>
                @endif
                @if($product->is_featured)
                <span class="inline-flex items-center px-2.5 py-1 bg-primary-500 text-white text-[10px] font-bold rounded-lg shadow-lg shadow-primary-500/30">
                    <i class="fas fa-fire mr-1"></i>Hot
                </span>
                @endif
            </div>
        </a>
        <div class="p-4 flex flex-col flex-1">
            @if($product->brand)
            <span class="text-[10px] text-dark-400 font-semibold uppercase tracking-wider mb-1">{{ $product->brand }}</span>
            @endif
            <a href="{{ route('products.show', $product->slug) }}" class="text-sm font-bold text-dark-800 group-hover:text-primary-600 transition line-clamp-2 mb-auto leading-snug">
                {{ $product->name }}
            </a>
            <div class="mt-3 pt-3 border-t border-dark-50">
                @if($product->sale_price)
                    <div class="flex items-baseline gap-2">
                        <span class="text-lg font-black text-red-500">{{ $product->formatted_sale_price }}</span>
                        <span class="text-xs text-dark-400 line-through">{{ $product->formatted_price }}</span>
                    </div>
                @else
                    <span class="text-lg font-black text-primary-600">{{ $product->formatted_price }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
