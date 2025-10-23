@props(['name', 'categories', 'brands', 'allCategories', 'allBrands'])

<div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-moot-orange">Filtros</h2>
        @if(!empty($name) || !empty($categories) || !empty($brands))
            <button wire:click="clearFilters" class="text-sm text-moot-orange hover:text-moot-black">
                Limpar
            </button>
        @endif
    </div>

    <div class="mb-6">
        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
            Buscar Produto
        </label>
        <input 
            type="text" 
            id="search"
            wire:model.live.debounce.300ms="name"
            placeholder="Nome do produto..."
            class="w-full px-4 py-2 border border-moot-gray rounded-lg focus:ring-2 focus:ring-moot-orange focus:border-transparent text-moot-black bg-moot-white"
        >
        @error('name') <span class="text-red-600 text-xs mt-1">{{ $message }}</span> @enderror
    </div>

    <div class="mb-6">
        <h3 class="text-sm font-medium text-gray-700 mb-3">Categorias</h3>
        <div class="space-y-2 max-h-64 overflow-y-auto">
            @foreach($allCategories as $category)
                <label class="flex items-center cursor-pointer hover:bg-orange-50 p-2 rounded">
                    <input 
                        type="checkbox" 
                        wire:model.live="categories"
                        value="{{ $category->id }}"
                        class="w-4 h-4 text-moot-orange border-moot-gray rounded focus:ring-moot-orange"
                    >
                    <span class="ml-2 text-sm text-moot-black">
                        {{ $category->description }}
                    </span>
                </label>
            @endforeach
        </div>
        @error('categories') <span class="text-red-600 text-xs mt-1">{{ $message }}</span> @enderror
        @error('categories.*') <span class="text-red-600 text-xs mt-1">{{ $message }}</span> @enderror
    </div>

    <div>
        <h3 class="text-sm font-medium text-gray-700 mb-3">Marcas</h3>
        <div class="space-y-2 max-h-64 overflow-y-auto">
            @foreach($allBrands as $brand)
                <label class="flex items-center cursor-pointer hover:bg-orange-50 p-2 rounded">
                    <input 
                        type="checkbox" 
                        wire:model.live="brands"
                        value="{{ $brand->id }}"
                        class="w-4 h-4 text-moot-orange border-moot-gray rounded focus:ring-moot-orange"
                    >
                    <span class="ml-2 text-sm text-moot-black">
                        {{ $brand->description }}
                    </span>
                </label>
            @endforeach
        </div>
        @error('brands') <span class="text-red-600 text-xs mt-1">{{ $message }}</span> @enderror
        @error('brands.*') <span class="text-red-600 text-xs mt-1">{{ $message }}</span> @enderror
    </div>
</div>