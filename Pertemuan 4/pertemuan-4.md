# Modul Pertemuan 4: CRUD, dan Validasi Input

**Tujuan Pembelajaran**

1. Mampu membuat dan mengonfigurasi Controller untuk menangani proses bisnis aplikasi.
2. Mampu membuat rute (Routing) untuk operasi CRUD.
3. Mampu menampilkan antarmuka pengguna (View) menggunakan Blade Template.
4. Mampu menerapkan Validasi Input untuk menjaga integritas data yang masuk ke database.

1\. Pembuatan Controller
------------------------
Kita akan menggunakan *Resource Controller* bawaan Laravel untuk menggenerate kereangka CRUD. Buka terminal dan jalankan:

```bash
php artisan make:controller ProductController
```

- Implementasi Logika & Validasi (Controller)
Buka app/Http/Controllers/ProductController.php:
![erd](ProductController.png)

2\. Routing
-----------------------------------------------
Buka file routes/web.php. Di sini kita akan mendefinisikan route untuk setiap operasi CRUD.
![erd](RouteProduct.png)

3\. Pembuatan Antarmuka (View / Blade)
--------------------------------------
Buat folder bernama product di dalam direktori resources/views/. Kemudian, buat 4 file Blade berikut:

A. Halaman Utama (resources/views/product/index.blade.php)
![erd](indexProduct.png)

B. Halaman Tambah Data (resources/views/product/create.blade.php)
![erd](CreateProduct.png)

C. Halaman Edit Data (resources/views/product/create.blade.php)
![erd](EditProducst.png)

B. Halaman View Data (resources/views/product/view.blade.php)
![erd](ViewProduct.png)
