<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Tops',
                'description' => 'Kaos hingga Jacket, nyaman, keren dan trendy',
            ],
            [
                'name' => 'Bottoms',
                'description' => 'Celana panjang hingga pendek, nyaman sekaligus trendy.',
            ],
            [
                'name' => 'Accessories',
                'description' => 'Topi, ikat pinggang, dan detail kecil yang bikin gaya makin maksimal.',
            ],
        ]);
    }
}
