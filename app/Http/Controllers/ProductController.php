<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductIndexRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function index(ProductIndexRequest $request)
    {
        $filters = $request->validated();
        $page = $request->input('page', 1);
        $perPage = $request->input('per_page', 15);

        return app(ProductService::class)
            ->search($filters, $perPage, $page);
    }
}
