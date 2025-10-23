<div>
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <aside class="lg:col-span-1">
                <x-product-filters 
                    :name="$name"
                    :categories="$categories"
                    :brands="$brands"
                    :allCategories="$allCategories"
                    :allBrands="$allBrands"
                />
            </aside>

            <main class="lg:col-span-3">
                <x-active-filters 
                    :name="$name"
                    :categories="$categories"
                    :brands="$brands"
                    :allCategories="$allCategories"
                    :allBrands="$allBrands"
                />

                <div class="mb-4">
                    <p class="text-sm text-gray-600">
                        {{ $products->total() }} produto(s) encontrado(s)
                    </p>
                </div>

                <x-product-grid 
                    :products="$products"
                    :name="$name"
                    :categories="$categories"
                    :brands="$brands"
                />
            </main>
        </div>
    </div>
</div>