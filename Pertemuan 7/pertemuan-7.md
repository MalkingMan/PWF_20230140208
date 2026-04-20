Modul Pertemuan 7: Component Berjalan
=====================================================================

**Tujuan Pembelajaran**
1. Mahasiswa dapat memahami cara kerja component berjalan di Laravel.
2. Mahasiswa dapat memahami konsep component dan fungsi component.
3. Mahasiswa mampu mengimplementasikan component pada view.

1\. Konsep Dasar Component Berjalan
--------------------------
Component Berjalan di Laravel adalah bagian UI (tampilan) yang bisa digunakan ulang (reusable) untuk menghindari penulangan kode di view (Blade).

2\. Implementasi 
----------------
Masukan perintah dibawah
``` bash
php artisan make:component AddProduct
```
- Membuat Logic Component (Class)
    app\View\Components\AddProduct.php
![erd](AddProduct.png)
    $url → untuk link tujuan
    $name → nama item (Product, User, dll)
    Constructor → menerima data dari Blade

- Membuat View Component
    \resources\views\components\add-product.blade.php
![erd](AddProduct-blade.png)
    {{ $url }} → link dinamis
    {{ $name }} → teks dinamis
    Bisa digunakan ulang untuk berbagai data

- Cara Menggunakan Component
    \resources\views\product\index.blade.php
![erd](AddProduct-index-blade.png)

3\. Penugasan
-------------
Buatkan Component untuk tombol Edit dan Delete pada menu view
![erd](image.png)

4\. Resource Belajar
--------------------
- [Laravel Components](https://laravel.com/docs/12.x/blade#components)






