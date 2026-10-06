<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prog = Category::where('name', 'Pemrograman')->first();
        $sains = Category::where('name', 'Sains & Teknologi')->first();
        $fiksi = Category::where('name', 'Fiksi & Sastra')->first();

        $books = [
            [
                'category_id' => $prog ? $prog->id : 1,
                'title' => 'Pemrograman Web dengan Laravel 11',
                'author' => 'Budi Raharjo',
                'publisher' => 'Informatika Bandung',
                'year' => 2024,
                'stock' => 15,
            ],
            [
                'category_id' => $prog ? $prog->id : 1,
                'title' => 'Mastering Database & MySQL',
                'author' => 'Eko Kurniawan Khannedy',
                'publisher' => 'Elex Media Komputindo',
                'year' => 2023,
                'stock' => 10,
            ],
            [
                'category_id' => $sains ? $sains->id : 2,
                'title' => 'Kecerdasan Buatan & AI Modern',
                'author' => 'Prof. Agus Zainal',
                'publisher' => 'Andi Publisher',
                'year' => 2022,
                'stock' => 8,
            ],
            [
                'category_id' => $fiksi ? $fiksi->id : 3,
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'publisher' => 'Bentang Pustaka',
                'year' => 2005,
                'stock' => 20,
            ],
            [
                'category_id' => $fiksi ? $fiksi->id : 3,
                'title' => 'Bumi Manusia',
                'author' => 'Pramoedya Ananta Toer',
                'publisher' => 'Lentera Dipantara',
                'year' => 1980,
                'stock' => 12,
            ],
        ];

        foreach ($books as $b) {
            Book::firstOrCreate(['title' => $b['title']], $b);
        }
    }
}
