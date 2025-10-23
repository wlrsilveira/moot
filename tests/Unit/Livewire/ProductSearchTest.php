<?php

namespace Tests\Unit\Livewire;

use App\Livewire\ProductSearch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use PHPUnit\Framework\Attributes\Test;

class ProductSearchTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_initializes_with_all_brands_and_categories()
    {
        Brand::factory()->count(2)->create();
        Category::factory()->count(2)->create();

        Livewire::test(ProductSearch::class)
            ->assertSet('allBrands', function ($brands) {
                return $brands->pluck('id')->all() === Brand::orderBy('description')->pluck('id')->all();
            })
            ->assertSet('allCategories', function ($categories) {
                return $categories->pluck('id')->all() === Category::orderBy('description')->pluck('id')->all();
            });
    }

    #[Test]
    public function it_validates_name_field()
    {
        Product::factory()->create();

        Livewire::test(ProductSearch::class)
            ->set('name', str_repeat('a', 101))
            ->assertHasErrors(['name' => 'max']);
    }

    #[Test]
    public function it_resets_page_on_filter_update()
    {
        Product::factory()->create();
        
        Livewire::test(ProductSearch::class)
            ->set('page', 1)
            ->set('name', 'Produto')
            ->assertSet('page', 1);
    }

    #[Test]
    public function it_clears_filters()
    {
        Livewire::test(ProductSearch::class)
            ->set('name', 'Produto')
            ->set('categories', [1,2])
            ->set('brands', [1])
            ->call('clearFilters')
            ->assertSet('name', '')
            ->assertSet('categories', [])
            ->assertSet('brands', []);
    } 
}
