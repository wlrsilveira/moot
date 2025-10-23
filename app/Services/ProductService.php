<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function search(array $filters, int $perPage = 15, int $page = 1)
    {
        return Product::query()
            ->when(isset($filters['name']), function ($query) use ($filters) {
                $query->where('name', 'like', '%' . $filters['name'] . '%');
            })
            ->when(isset($filters['categories']), function ($query) use ($filters) {
                $query->whereIn('category_id', $filters['categories']);
            })
            ->when(isset($filters['brands']), function ($query) use ($filters) {
                $query->whereIn('brand_id', $filters['brands']);
            })
            ->paginate($perPage, ['*'], 'page', $page);
    }
}
