<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProducts(Request $request)
    {
        $search = $request->search;

        $products = Product::query()
            ->with('category')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->latest()
            ->paginate(12);

        return view('products', [
            'products' => $products,
            'search' => $search ?? ''
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
