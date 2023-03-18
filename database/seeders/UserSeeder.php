<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'password' => bcrypt('oxwZSL79'),
        ]);
    }
}
