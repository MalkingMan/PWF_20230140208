<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Tampilkan daftar category + total product masing-masing.
     */
    public function index()
    {
        $categories = Category::withCount('products')->latest()->paginate(10);
        return view('category.index', compact('categories'));
    }

    /**
     * Form tambah category baru.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Simpan category baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ], [
            'name.required' => 'Nama category wajib diisi.',
            'name.unique'   => 'Category dengan nama ini sudah ada.',
            'name.max'      => 'Nama category maksimal 255 karakter.',
        ]);

        Category::create(['name' => $request->name]);

        return redirect()->route('category.index')
            ->with('success', 'Category berhasil ditambahkan!');
    }

    /**
     * Form edit category.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update category di database.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ], [
            'name.required' => 'Nama category wajib diisi.',
            'name.unique'   => 'Category dengan nama ini sudah ada.',
            'name.max'      => 'Nama category maksimal 255 karakter.',
        ]);

        $category->update(['name' => $request->name]);

        return redirect()->route('category.index')
            ->with('success', 'Category berhasil diperbarui!');
    }

    /**
     * Hapus category dari database.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Category berhasil dihapus!');
    }
}
