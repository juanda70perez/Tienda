<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        File::deleteDirectory(public_path('storage/products'));

        File::makeDirectory(public_path('storage/products'));
        File::deleteDirectory(public_path('storage/subcategories'));
        File::makeDirectory(public_path('storage/subcategories'));
        File::deleteDirectory(public_path('storage/categories'));
        File::makeDirectory(public_path('storage/categories'));

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ProductSeeder::class);
    }
}
