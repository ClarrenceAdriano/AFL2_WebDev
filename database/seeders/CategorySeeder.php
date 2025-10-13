<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'Streetwear',
                'description' => 'Gaya kasual kekinian untuk tampil lebih percaya diri di jalanan.',
            ],
            [
                'name' => 'Formal Wear',
                'description' => 'Pakaian elegan untuk meeting, kerja, atau acara resmi.',
            ],
            [
                'name' => 'Outerwear',
                'description' => 'Jaket dan coat stylish untuk melengkapi tampilan di cuaca dingin.',
            ],
            [
                'name' => 'Bottoms',
                'description' => 'Celana panjang hingga pendek, nyaman sekaligus trendy.',
            ],
            [
                'name' => 'Activewear',
                'description' => 'Baju sporty yang ringan, cocok untuk olahraga maupun casual style.',
            ],
            [
                'name' => 'Accessories',
                'description' => 'Topi, ikat pinggang, dan detail kecil yang bikin gaya makin maksimal.',
            ],
        ]);
    }
}
