<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductViewController extends Controller
{
    public function index()
    {
        return view('dashboard.products.index');
    }

    public function create()
    {
        return view('dashboard.products.create');
    }

    public function edit(Product $product)
    {
        return view('dashboard.products.edit', compact('product'));
    }
}

