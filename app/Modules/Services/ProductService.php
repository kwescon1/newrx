<?php

namespace App\Modules\Services;

use App\Models\Product;
use App\Exceptions\NotFoundException;

class ProductService
{

    public function index()
    {
        return Product::with('category')->get();
    }


    public function show($id): ?object
    {
        $product = Product::with('category')->where('id', $id)->first();

        if (!$product) {
            throw new NotFoundException("Product Not Found");
        }

        return $product;
    }
}
