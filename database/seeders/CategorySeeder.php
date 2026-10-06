<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Pemrograman',
                'description' => 'Buku-buku mengenai pemrograman, algoritma, dan rekayasa perangkat lunak.',
            ],
            [
                'name' => 'Sains & Teknologi',
                'description' => 'Buku seputar perkembangan ilmu pengetahuan, sains populer, dan komputer.',
            ],
            [
                'name' => 'Fiksi & Sastra',
                'description' => 'Novel, karya sastra klasik, dan fiksi populer modern.',
            ],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['name' => $cat['name']], $cat);
        }
    }
}
