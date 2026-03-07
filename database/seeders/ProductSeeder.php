<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['user_id' => 1, 'name' => 'Laptop Lenovo ThinkPad', 'qty' => 10, 'price' => 12500000.00],
            ['user_id' => 1, 'name' => 'Mouse Wireless Logitech', 'qty' => 50, 'price' => 250000.00],
            ['user_id' => 2, 'name' => 'Keyboard Mechanical Keychron', 'qty' => 25, 'price' => 850000.00],
            ['user_id' => 2, 'name' => 'Monitor LG 24 inch', 'qty' => 15, 'price' => 2300000.00],
            ['user_id' => 3, 'name' => 'Headset Gaming Rexus', 'qty' => 30, 'price' => 450000.00],
            ['user_id' => 3, 'name' => 'Webcam Logitech C920', 'qty' => 20, 'price' => 1100000.00],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
