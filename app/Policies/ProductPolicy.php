<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    /**
     * Semua user (admin & biasa) boleh melihat daftar produk.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Semua user boleh melihat detail produk.
     */
    public function view(User $user, Product $product): bool
    {
        return true;
    }

    /**
     * Semua user boleh membuat produk baru.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Update: user biasa hanya bisa update produk miliknya sendiri.
     * Admin bisa update semua produk.
     */
    public function update(User $user, Product $product): bool
    {
        // Admin boleh update semua
        if ($user->role === 'admin') {
            return true;
        }

        // User biasa hanya boleh update produk miliknya
        return $user->id === $product->user_id;
    }

    /**
     * Delete: user biasa hanya bisa hapus produk miliknya sendiri.
     * Admin bisa hapus semua produk.
     */
    public function delete(User $user, Product $product): bool
    {
        // Admin boleh hapus semua
        if ($user->role === 'admin') {
            return true;
        }

        // User biasa hanya boleh hapus produk miliknya
        return $user->id === $product->user_id;
    }

    /**
     * Restore: hanya admin.
     */
    public function restore(User $user, Product $product): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Force delete: hanya admin.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        return $user->role === 'admin';
    }
}
