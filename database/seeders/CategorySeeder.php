<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Catch_;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            [
                'name' => 'Celulares y tables',
                'slug' =>  Str::slug('Celulares y tables'),
                'icon' => '<i class="fa-regular fa-mobile"></i>'
            ],
            [
                'name' => 'TV, audio y video',
                'slug' =>  Str::slug('TV, audio y video'),
                'icon' => '<i class="fa-solid fa-tv"></i>'
            ],
            [
                'name' => 'Consola y videojuegos',
                'slug' =>  Str::slug('Consola y videojuegos'),
                'icon' => '<i class="fa-regular fa-gamepad"></i>'
            ],
            [
                'name' => 'Computación',
                'slug' =>  Str::slug('Computación'),
                'icon' =>' <i class="fa-regular fa-computer-speaker"></i>'
            ],
            [
                'name' => 'Moda',
                'slug' =>  Str::slug('Moda'),
                'icon' =>' <<i class="fa-regular fa-shirt"></i>'
            ],
        ];
            foreach ($categories as $category) {
                $category2 = Category::factory(1)->create($category)->first();

                $brands = Brand::factory(4)->create();

                foreach($brands as $brand){
                    $brand->categories()->attach($category2->id);
                }
            }

    }
}
