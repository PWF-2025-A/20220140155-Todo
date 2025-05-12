<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Todo;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat 1 user admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_admin' => true,
        ]);

        // Buat 100 user biasa
        User::factory(100)->create();

        // Buat 5 kategori
        Category::factory(5)->create();

        // Buat 500 todo yang otomatis terhubung ke category lewat factory
        Todo::factory(200)->create();
    }
}
