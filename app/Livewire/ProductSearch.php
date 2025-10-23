<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Services\ProductService;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
{
    use WithPagination;

    public $name = '';
    public $categories = [];
    public $brands = [];
    public $page = 1;

    public $per_page = 3;

    public $allBrands = [];
    public $allCategories = [];

    protected $queryString = [
        'name' => ['except' => ''],
        'categories' => ['except' => []],
        'brands' => ['except' => []],
        'page' => ['except' => 1],
    ];

    public function rules()
    {
        return [
            'name' => ['nullable', 'string', 'max:100'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['integer', 'exists:categories,id'],
            'brands' => ['nullable', 'array'],
            'brands.*' => ['integer', 'exists:brands,id'],
            'page' => ['nullable', 'integer', 'min:1'],
            'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'O nome do produto deve ser um texto.',
            'name.max' => 'O nome do produto não pode ter mais que 100 caracteres.',
            'categories.array' => 'As categorias devem ser enviadas em formato de lista.',
            'categories.*.integer' => 'Cada categoria deve ser um número inteiro.',
            'categories.*.exists' => 'Uma ou mais categorias selecionadas são inválidas.',
            'brands.array' => 'As marcas devem ser enviadas em formato de lista.',
            'brands.*.integer' => 'Cada marca deve ser um número inteiro.',
            'brands.*.exists' => 'Uma ou mais marcas selecionadas são inválidas.',
            'page.integer' => 'O número da página deve ser um número inteiro.',
            'page.min' => 'O número da página deve ser pelo menos 1.',
            'per_page.integer' => 'O número de itens por página deve ser um número inteiro.',
            'per_page.min' => 'O número de itens por página deve ser pelo menos 1.',
            'per_page.max' => 'O número de itens por página não pode ser maior que 100.',
        ];
    }

    public function mount()
    {
        $this->allBrands = Brand::orderBy('description')->get();
        $this->allCategories = Category::orderBy('description')->get();
    }
   
    public function updatedName()
    {
        $this->validateOnly('name');
        $this->resetPage();
    }

    public function updatedCategories()
    {
        $this->validateOnly('categories');
        $this->resetPage();
    }

    public function updatedBrands()
    {
        $this->validateOnly('brands');
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->reset(['name', 'categories', 'brands']);
        $this->resetPage();
    }

    public function render()
    {
        $filters = [
            'name' => $this->name ?: null,
            'categories' => !empty($this->categories) ? $this->categories : null,
            'brands' => !empty($this->brands) ? $this->brands : null,
        ];

        $products = app(ProductService::class)
            ->search($filters, $this->per_page, $this->page);
            
        return view('livewire.product-search', [
            'products' => $products,
            'allCategories' => $this->allCategories,
            'allBrands' => $this->allBrands,
        ]);
    }
}
