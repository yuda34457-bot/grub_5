<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Articles
        \App\Models\Article::firstOrCreate(
            ['slug' => 'menjaga-kesehatan-mata'],
            [
                'title' => 'Cara Menjaga Kesehatan Mata di Era Digital',
                'content' => 'Di era digital ini, mata kita sering kelelahan karena menatap layar terlalu lama. Gunakan aturan 20-20-20: setiap 20 menit, tatap objek sejauh 20 kaki selama 20 detik.',
                'category' => 'Edukasi',
                'is_published' => true,
                'image' => null,
            ]
        );

        \App\Models\Article::firstOrCreate(
            ['slug' => 'mengenal-katarak'],
            [
                'title' => 'Mengenal Katarak dan Cara Pencegahannya',
                'content' => 'Katarak adalah kekeruhan pada lensa mata yang biasanya terjadi karena penuaan. Lindungi mata dari sinar UV dan konsumsi makanan bergizi.',
                'category' => 'Penyakit Mata',
                'is_published' => true,
                'image' => null,
            ]
        );

        // Products
        \App\Models\Product::firstOrCreate(
            ['slug' => 'kacamata-anti-radiasi'],
            [
                'name' => 'Kacamata Anti Radiasi Premium',
                'description' => 'Melindungi mata Anda dari paparan sinar biru layar komputer dan gadget.',
                'category' => 'glasses',
                'price' => 250000,
                'stock' => 50,
                'is_active' => true,
                'image' => null,
            ]
        );

        \App\Models\Product::firstOrCreate(
            ['slug' => 'insto-dry-eyes'],
            [
                'name' => 'Obat Tetes Mata Kering 15ml',
                'description' => 'Meredakan gejala mata kering dan iritasi ringan.',
                'category' => 'eye_drop',
                'price' => 35000,
                'stock' => 100,
                'is_active' => true,
                'image' => null,
            ]
        );
    }
}
