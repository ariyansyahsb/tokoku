<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Product::truncate();

        $products = [
            ['name' => 'Kaos Polos Cotton Combed 30s Lengan Pendek', 'description' => 'Kaos polos bahan katun premium, adem, cocok untuk sablon. Min. order 12 pcs.', 'price' => 55000, 'stock' => 100, 'image' => 'image/kaos.jpeg'],
            ['name' => 'Kaos Polos Cotton Combed 24s Lengan Pendek', 'description' => 'Kaos custom desain bebas, sablon DTF awet, lebih Tebal. Min. order 12 pcs.', 'price' => 65000, 'stock' => 100, 'image' => 'image/kaos.jpeg'],
            ['name' => 'Kemeja PDH/PDL Lengan Pendek', 'description' => 'Kemeja kerja standart safety bahan drill premium, sudah free bordir logo perusahaan, bisa satuan.', 'price' => 98000, 'stock' => 50, 'image' => 'image/poloshirt.jpeg'],
            ['name' => 'Kemeja PDH/PDL Lengan Panjang', 'description' => 'Kemeja kerja standart safety bahan drill premium, sudah free bordir logo perusahaan, bisa satuan.', 'price' => 108000, 'stock' => 50, 'image' => 'image/kemeja-panjang.jpg'],
            ['name' => 'Custom Jersey Lengan Pendek', 'description' => 'Jersey full print, bahan dryfit, desain bebas. Min order 12 pcs', 'price' => 85000, 'stock' => 500, 'image' => 'image/jersey.jpg'],
            ['name' => 'Wearpack Setelan', 'description' => 'wearpack kerja atasan dan celana standart safety, sudah free bordir logo safety bendera dan logo perusahaan, min order 12 pcs.', 'price' => 245000, 'stock' => 50, 'image' => 'image/wearpack.jpg'],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}