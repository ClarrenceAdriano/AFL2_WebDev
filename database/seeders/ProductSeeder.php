<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Kaos Polos Hitam',
                'description' => 'Kaos polos berbahan katun lembut, cocok untuk kegiatan sehari-hari.',
                'price' => 75000,
                'stock' => 30,
                'category_id' => 1,
                'image' => 'https://i.pinimg.com/736x/e8/9d/63/e89d63b118bf723c5ce4b81e9e6ab621.jpg',
            ],
            [
                'name' => 'Kaos Polos Putih',
                'description' => 'Kaos polos berbahan katun lembut, cocok untuk kegiatan sehari-hari.',
                'price' => 75000,
                'stock' => 30,
                'category_id' => 1,
                'image' => 'https://i.pinimg.com/736x/71/87/45/718745f166f14171900b403e0c1d7494.jpg',
            ],
            [
                'name' => 'Kemeja Putih Formal',
                'description' => 'Kemeja putih lengan panjang untuk tampilan profesional.',
                'price' => 120000,
                'stock' => 20,
                'category_id' => 1,
                'image' => 'https://i.pinimg.com/1200x/4b/b6/05/4bb60531695ce9c165c99b8e17b6d201.jpg',
            ],
            [
                'name' => 'Kemeja Biru Formal',
                'description' => 'Kemeja biru lengan panjang untuk tampilan profesional.',
                'price' => 120000,
                'stock' => 20,
                'category_id' => 1,
                'image' => 'https://i.pinimg.com/1200x/86/b7/3c/86b73cf3518b04241106d10eb9f50078.jpg',
            ],
            [
                'name' => 'Celana Jeans Biru',
                'description' => 'Jeans biru klasik dengan potongan regular fit.',
                'price' => 180000,
                'stock' => 15,
                'category_id' => 2,
                'image' => 'https://i.pinimg.com/1200x/22/09/a1/2209a1ff9fa41ad3653b8ddf797de46f.jpg',
            ],
            [
                'name' => 'Celana Jeans Hitam',
                'description' => 'Jeans hitam klasik dengan potongan regular fit.',
                'price' => 180000,
                'stock' => 15,
                'category_id' => 2,
                'image' => 'https://i.pinimg.com/1200x/55/91/76/559176e57e352721d0f062bdae995c38.jpg',
            ],
            [
                'name' => 'Celana Kain Hitam',
                'description' => 'Chino hitam klasik dengan potongan regular fit.',
                'price' => 180000,
                'stock' => 15,
                'category_id' => 2,
                'image' => 'https://i.pinimg.com/1200x/51/69/e2/5169e26ab795eb2e049a87c4b6e01790.jpg',
            ],
            [
                'name' => 'Celana Kain Cream',
                'description' => 'Chino cream klasik dengan potongan regular fit.',
                'price' => 180000,
                'stock' => 15,
                'category_id' => 2,
                'image' => 'https://i.pinimg.com/1200x/29/bb/e0/29bbe0bcf9dc56a936104f1aa8ad7192.jpg',
            ],
            [
                'name' => 'Hoodie Abu-abu',
                'description' => 'Hoodie nyaman dengan bahan fleece hangat.',
                'price' => 200000,
                'stock' => 10,
                'category_id' => 1,
                'image' => 'https://i.pinimg.com/1200x/73/c9/ef/73c9efc7da1230b88575eba2ae03fb3d.jpg',
            ],
            [
                'name' => 'Hoodie Hitam',
                'description' => 'Hoodie nyaman dengan bahan fleece hangat.',
                'price' => 200000,
                'stock' => 10,
                'category_id' => 1,
                'image' => 'https://i.pinimg.com/736x/69/60/05/696005d91605b4099e04daf51193b7fe.jpg',
            ],
            [
                'name' => 'Baseball Cap',
                'description' => 'Topi dengan desain jaring di belakang, cocok untuk gaya kasual.',
                'price' => 50000,
                'stock' => 25,
                'category_id' => 3,
                'image' => 'https://i.pinimg.com/736x/e6/b8/b9/e6b8b98f3ea51c9e9e34aaec69166b7c.jpg',
            ],
            [
                'name' => 'Ikat Pinggang',
                'description' => 'Ikat pinggang yang nyaman dan catchy',
                'price' => 50000,
                'stock' => 25,
                'category_id' => 3,
                'image' => 'https://i.pinimg.com/1200x/70/e8/f0/70e8f06129e0d22fec1d8383a8decc00.jpg',
            ],
        ]);
    }
}
