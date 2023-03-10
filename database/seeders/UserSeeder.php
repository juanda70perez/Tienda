<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //
        User::create([
            'name' => 'Juan David Pérez',
            'Email' => 'juan-10david@hotmail.com',
            'password' => bcrypt('oxwZSL79')
        ]);
    }
}
