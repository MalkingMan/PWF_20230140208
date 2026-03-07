<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            ['product_id' => 1, 'name' => 'Elektronik'],
            ['product_id' => 1, 'name' => 'Komputer & Laptop'],
            ['product_id' => 2, 'name' => 'Aksesori Komputer'],
            ['product_id' => 3, 'name' => 'Aksesori Komputer'],
            ['product_id' => 4, 'name' => 'Elektronik'],
            ['product_id' => 4, 'name' => 'Monitor & Display'],
            ['product_id' => 5, 'name' => 'Gaming'],
            ['product_id' => 6, 'name' => 'Video & Streaming'],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
