Modul Pertemuan 6: Laravel Validation
=====================================================================

**Tujuan Pembelajaran**
1. Mahasiswa dapat memahami cara kerja validasi di Laravel.
2. Mahasiswa dapat memahami konsep validasi dan fungsi validasi.
3. Mahasiswa mampu mengimplementasikan validasi pada form input.

1\. Konsep Dasar Validasi
-------------------------
Apa itu Validasi?
Validasi adalah proses memverifikasi dan menyaring data yang dikirimkan oleh pengguna (melalui form atau API) sebelum data tersebut diproses lebih lanjut atau disimpan ke dalam database. Sistem akan mengecek apakah data tersebut sesuai dengan aturan (rules) yang telah ditetapkan oleh developer.

Mengapa Validasi Sangat Penting?
> Keamanan (Security): Mencegah serangan malicious seperti SQL Injection atau Cross-Site Scripting (XSS) dengan memastikan hanya data dengan format yang benar yang bisa masuk ke sistem.

> Integritas Data (Data Integrity): Memastikan database tidak dipenuhi oleh data yang korup, kosong, atau tidak masuk akal (misalnya: harga bernilai negatif, atau email tanpa tanda '@').

> Pengalaman Pengguna (User Experience/UX): Memberikan feedback atau pesan kesalahan yang jelas kepada pengguna ketika mereka salah memasukkan data, sehingga mereka tahu apa yang harus diperbaiki.

2\. Cara Kerja Validasi di Laravel
----------------------------------
Laravel menyediakan fitur validasi bawaan yang sangat kuat dan mudah digunakan. Alur kerjanya adalah sebagai berikut:
1. Request Datang: Pengguna mengisi form dan menekan tombol submit.
2. Pengecekan Aturan: Controller (atau Form Request) akan memeriksa data tersebut berdasarkan aturan yang dibuat (contoh: nama wajib diisi, minimal 5 karakter).
3. Lolos (Passed): Jika semua data sesuai aturan, aplikasi akan melanjutkan proses (misal: menyimpan ke database).
4. Gagal (Failed): Jika ada satu saja aturan yang dilanggar, Laravel secara otomatis akan menghentikan proses, lalu mengembalikan (redirect) pengguna ke halaman sebelumnya dengan membawa data pesan error dan inputan lama (old input).

3\. Implementasi Validasi
-------------------------
Terdapat beberapa cara mengimplementasikan validasi di Laravel.
> Didalam Controller
![erd](controller-validation.png)

> Cara Lanjutan
``` bash
php artisan make:request StoreProductRequest
```
Perintah ini akan membuat file di app/Http/Requests/StoreProductRequest.php di mana logika aturan (rules) dan otorisasi ditempatkan secara terpisah dari Controller.
![erd](requ-validation.png)

4\. PENUGASAN
-------------
Buatlah validasi store dan update beserta screenshootnya.

5\. Resource Belajar
--------------------
- [Laravel Auth](https://laravel.com/docs/13.x/validation#main-content)



