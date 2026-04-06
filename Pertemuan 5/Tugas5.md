# Tugas Pertemuan 5 — Otorisasi (Authorization): Role, Gate, dan Policy

**Nama  :** Muhammad Array Al-khozini  
**NIM   :** 20230140208  
**Mata Kuliah :** Pemrograman Web Framework  


## 1. Persiapan Role

Menambahkan kolom `role` (string, default: 'user') ke tabel `users` melalui migration:

```bash
php artisan make:migration add_role_to_users_table --table=users
```

### Migration: add_role_to_users_table.php
```php
public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('role')->default('user')->after('password');
    });
}
```

### Model User — tambah fillable & helper isAdmin()
```php
protected $fillable = ['name', 'email', 'password', 'role'];

public function isAdmin(): bool
{
    return $this->role === 'admin';
}
```

### Set user menjadi admin via Seeder
```bash
php artisan db:seed --class=AdminSeeder
```
Hasil: User **M. Array** diubah menjadi role `admin`.


## 2. Implementasi Gate

Gate `manage-product` didefinisikan di `AppServiceProvider.php`:

```php
use Illuminate\Support\Facades\Gate;

public function boot(): void
{
    Gate::define('manage-product', function ($user) {
        return $user->role === 'admin';
    });
}
```

Gate ini mengembalikan `true` hanya jika user memiliki role `admin`.


## 3. Penerapan Gate pada Route & Tampilan

### Menyembunyikan menu Product & Kategori di navigasi (hanya admin)
```blade
@can('manage-product')
    <x-nav-link :href="route('product.index')" :active="request()->routeIs('product.*')">
        {{ __('Product') }}
    </x-nav-link>
    <x-nav-link :href="route('kategori.index')" :active="request()->routeIs('kategori.*')">
        {{ __('Kategori') }}
    </x-nav-link>
@endcan
```

### Mengamankan Route Kategori dengan middleware Gate
```php
// routes/web.php
Route::resource('kategori', KategoriController::class)->middleware('can:manage-product');
```

User biasa yang mengakses `/kategori` akan mendapat error **403 Forbidden**.


## 4. Implementasi Policy

Policy dibuat menggunakan perintah Artisan:

```bash
php artisan make:policy ProductPolicy --model=Product
```

File yang dihasilkan: `app/Policies/ProductPolicy.php`


## 5. Logika Policy (update & delete)

### ProductPolicy.php
```php
public function update(User $user, Product $product): bool
{
    if ($user->role === 'admin') {
        return true;
    }
    return $user->id === $product->user_id;
}

public function delete(User $user, Product $product): bool
{
    if ($user->role === 'admin') {
        return true;
    }
    return $user->id === $product->user_id;
}
```

### Penerapan di ProductController
```php
public function edit(Product $product)
{
    $this->authorize('update', $product);
    // ...
}

public function update(Request $request, Product $product)
{
    $this->authorize('update', $product);
    // ...
}

public function destroy(Product $product)
{
    $this->authorize('delete', $product);
    // ...
}
```

### Penerapan di Blade (sembunyikan tombol Edit/Hapus)
```blade
@can('update', $product)
    <a href="{{ route('product.edit', $product) }}">Edit</a>
@endcan
@can('delete', $product)
    <form action="{{ route('product.destroy', $product) }}" method="POST">
        @csrf @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
@endcan
```


## Hasil Akhir — Tabel Hak Akses

| Fitur | User Biasa | Admin |
|-------|-----------|-------|
| Menu Product & Kategori di navbar | ❌ Tersembunyi | ✅ Terlihat |
| Akses route `/kategori` | ❌ 403 Forbidden | ✅ Bisa akses |
| Akses route `/product` | ✅ Bisa akses (via URL) | ✅ Bisa akses |
| Edit/Hapus produk **milik sendiri** | ✅ | ✅ |
| Edit/Hapus produk **orang lain** | ❌ 403 Forbidden | ✅ |


## Screenshot Tugas

### Dashboard (menampilkan status Role)
*(tambahkan screenshot di sini)*

### Tampilan Navbar — Login sebagai Admin
*(tambahkan screenshot di sini)*

### Tampilan Navbar — Login sebagai User Biasa
*(tambahkan screenshot di sini)*

### Halaman Product List (Admin)
*(tambahkan screenshot di sini)*

### Halaman Kategori (Admin Only)
*(tambahkan screenshot di sini)*

### User biasa mencoba akses Kategori (403 Forbidden)
*(tambahkan screenshot di sini)*
