<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicleModels = [
            [
                'name' => 'Corolla',
                'description' => 'Toyota',
                'is_active' => true,
                'manufacturer_id' => 1,
            ],
            [
                'name' => 'Camry',
                'description' => 'Toyota',
                'is_active' => true,
                'manufacturer_id' => 1,
            ],
            [
                'name' => 'Prius',
                'description' => 'Toyota',
                'is_active' => true,
                'manufacturer_id' => 1,
            ],
            [
                'name' => 'Civic',
                'description' => 'Honda',
                'is_active' => true,
                'manufacturer_id' => 2,
            ],
            [
                'name' => 'Accent',
                'description' => 'Honda',
                'is_active' => true,
                'manufacturer_id' => 2,
            ],
            [
                'name' => 'Leaf',
                'description' => 'Nissan',
                'is_active' => true,
                'manufacturer_id' => 3,
            ],
            [
                'name' => 'Altima',
                'description' => 'Nissan',
                'is_active' => true,
                'manufacturer_id' => 3,
            ],
            [
                'name' => 'Maxima',
                'description' => 'Mazda',
                'is_active' => true,
                'manufacturer_id' => 4,
            ],
            [
                'name' => '3-Series',
                'description' => 'Mercedes',
                'is_active' => true,
                'manufacturer_id' => 5,
            ],
            [
                'name' => '5-Series',
                'description' => 'Mercedes',
                'is_active' => true,
                'manufacturer_id' => 5,
            ]
        ];

        foreach ($vehicleModels as $vehicleModel) {
            \App\Models\VehicleModel::create($vehicleModel);
        }
    }
}
