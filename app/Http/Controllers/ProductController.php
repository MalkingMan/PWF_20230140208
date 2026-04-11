<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('user')->latest()->paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('product.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     * Validasi menggunakan StoreProductRequest (Form Request).
     */
    public function store(StoreProductRequest $request)
    {
        // Validasi sudah otomatis dijalankan oleh StoreProductRequest
        Product::create($request->validated());

        return redirect()->route('product.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('user');
        return view('product.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);

        $users = User::all();
        return view('product.edit', compact('product', 'users'));
    }

    /**
     * Update the specified resource in storage.
     * Validasi menggunakan UpdateProductRequest (Form Request).
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        // Validasi sudah otomatis dijalankan oleh UpdateProductRequest
        $product->update($request->validated());

        return redirect()->route('product.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
