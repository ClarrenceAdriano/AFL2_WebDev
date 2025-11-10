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
        $categoryId = $request->category;

        $query = \App\Models\Product::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $category = null;

        if ($categoryId) {
            $category = Category::find($categoryId);
        }


        $products = $query->paginate(12);
        $categories = \App\Models\Category::all();

        return view('products', compact('products', 'categories', 'search', 'categoryId', 'category'));
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

    public function create()
    {
        $categories = Category::all();
        return view('addProduct', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('name', 'description', 'price', 'stock', 'category_id');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = '/storage/' . $imagePath;
        }

        Product::create($data);

        return redirect()->route('products')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('editProduct', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = '/storage/' . $imagePath;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('products')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products')->with('success', 'Produk berhasil dihapus.');
    }
}
