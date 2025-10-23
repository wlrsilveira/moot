@props(['name', 'categories', 'brands', 'allCategories', 'allBrands'])

@if(!empty($name) || !empty($categories) || !empty($brands))
    <div class="bg-orange-50 border border-moot-orange rounded-lg p-4 mb-6">
        <div class="flex flex-wrap gap-2 items-center">
            <span class="text-sm font-medium text-moot-black">Filtros ativos:</span>
            
            @if(!empty($name))
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-moot-orange text-moot-white">
                    Busca: "{{ $name }}"
                    <button wire:click="$set('name', '')" class="ml-2 hover:text-moot-black">×</button>
                </span>
            @endif

            @foreach($categories as $categoryId)
                @php $category = $allCategories->find($categoryId); @endphp
                @if($category)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-moot-white text-moot-orange border border-moot-orange">
                        {{ $category->description }}
                        <button wire:click="$set('categories', {{ json_encode(array_values(array_diff($categories, [$categoryId]))) }})" class="ml-2 hover:text-moot-black">×</button>
                    </span>
                @endif
            @endforeach

            @foreach($brands as $brandId)
                @php $brand = $allBrands->find($brandId); @endphp
                @if($brand)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-moot-gray text-moot-white">
                        {{ $brand->description }}
                        <button wire:click="$set('brands', {{ json_encode(array_values(array_diff($brands, [$brandId]))) }})" class="ml-2 hover:text-moot-black">×</button>
                    </span>
                @endif
            @endforeach
        </div>
    </div>
@endif