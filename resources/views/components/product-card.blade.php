@props(['product'])

<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
    <div class="aspect-w-16 aspect-h-9 bg-gray-200 text-center justify-center overflow-hidden flex items-center">
        <img 
            src="{{ asset('/images/products/' . $product->photo) }}" 
            alt="{{ $product->name }}" 
            class="w-64 h-64 object-contain mx-auto"
        >
    </div>
    <div class="p-4">
        <h3 class="font-semibold text-lg mb-2 line-clamp-2 text-moot-black">{{ $product->name }}</h3>
        <div class="flex flex-wrap gap-2 mb-3">
            <span class="text-xs px-2 py-1 bg-orange-50 text-moot-orange rounded">
                {{ $product->category->description }}
            </span>
            <span class="text-xs px-2 py-1 bg-moot-gray text-moot-orange rounded">
                {{ $product->brand->description }}
            </span>
        </div>
        <p class="text-2xl font-bold text-moot-orange">
            R$ {{ number_format($product->price, 2, ',', '.') }}
        </p>
    </div>
</div>