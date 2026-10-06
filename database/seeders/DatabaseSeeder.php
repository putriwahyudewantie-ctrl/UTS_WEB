<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User default untuk login sesuai permintaan
        User::firstOrCreate(
            ['email' => 'dewanti@gmail.com'],
            [
                'name' => 'Putri Wahyu Dewantie',
                'password' => Hash::make('admin123'),
            ]
        );

        $this->call([
            CategorySeeder::class,
            BookSeeder::class,
        ]);
    }
}
