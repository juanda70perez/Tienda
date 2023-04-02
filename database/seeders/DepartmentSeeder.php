<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Department;
use App\Models\District;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::factory(8)->create()->each(function (Department $departament) {
            City::factory(8)->create([
                'department_id' => $departament->id,
            ])->each(function (City $city) {
                District::factory(8)->create([
                    'city_id' => $city->id,
                ]);
            });
        });
    }
}
