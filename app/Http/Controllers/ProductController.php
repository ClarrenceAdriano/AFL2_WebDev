<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProducts(Request $request)
    {
        if ($request->filled('search')) {
            $keyword = $request->search;

            $categories = Category::whereHas('products', function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            })
            ->with(['products' => function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            }])
            ->get();
        } else {
            $categories = Category::with('products')->get();
        }

        return view('products', [
            'categories' => $categories,
            'search' => $request->search ?? ''
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
