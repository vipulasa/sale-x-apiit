<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturers = [
            [
                'name' => 'Toyota',
                'description' => 'Toyota',
                'is_active' => true,
            ],
            [
                'name' => 'Honda',
                'description' => 'Honda',
                'is_active' => true,
            ],
            [
                'name' => 'Nissan',
                'description' => 'Nissan',
                'is_active' => true,
            ],
            [
                'name' => 'Mazda',
                'description' => 'Mazda',
                'is_active' => true,
            ],
            [
                'name' => 'Mercedes',
                'description' => 'Mercedes',
                'is_active' => true,
            ],
            [
                'name' => 'Audi',
                'description' => 'Audi',
                'is_active' => true,
            ],
            [
                'name' => 'BMW',
                'description' => 'BMW',
                'is_active' => true,
            ],
            [
                'name' => 'Volkswagen',
                'description' => 'Volkswagen',
                'is_active' => true,
            ],
            [
                'name' => 'Porsche',
                'description' => 'Porsche',
                'is_active' => true,
            ],
            [
                'name' => 'Ferrari',
                'description' => 'Ferrari',
                'is_active' => true,
            ],
            [
                'name' => 'Lamborghini',
                'description' => 'Lamborghini',
                'is_active' => true,
            ]
        ];

        foreach ($manufacturers as $manufacturer) {
            \App\Models\Manufacturer::create($manufacturer);
        }
    }
}
