<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function showProducts()
    {
        $categories = Category::with('products')->get();

        return view('products', [
            'categories' => $categories
        ]);
    }

    public function featuredProducts()
    {
        $carouselProducts = Product::whereIn('id', function ($query) {
            $query->selectRaw('MIN(id)')
                ->from('products')
                ->groupBy('category_id');
        })->get();

        return view('home', [
            'carouselProducts' => $carouselProducts
        ]);
    }

    public function show(Product $product)
    {
        return view('details', [
            'product' => $product
        ]);
    }
}
