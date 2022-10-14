<?php

namespace App\Services\Product;

use App\Product;

class ListProductService
{
    public function execute()
    {
        $products = Product::orderBy('name', 'asc')->paginate(20);

        return view('app.products.list', [
            'products' => $products
        ]);
    }
}
