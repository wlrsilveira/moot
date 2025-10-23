@props(['products', 'name' => '', 'categories' => [], 'brands' => []])

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    @forelse($products as $product)
        <x-product-card :product="$product" />
    @empty
        <div class="col-span-full bg-white rounded-lg shadow-md p-12 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhum produto encontrado</h3>
            <p class="mt-1 text-sm text-gray-500">Tente ajustar os filtros ou fazer uma nova busca.</p>
            @if(!empty($name) || !empty($categories) || !empty($brands))
                <button wire:click="clearFilters" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-moot-white bg-moot-orange hover:bg-moot-black">
                    Limpar Filtros
                </button>
            @endif
        </div>
    @endforelse
</div>

@if($products->hasPages())
    <div class="mt-6">
        {{ $products->links() }}
    </div>
@endif