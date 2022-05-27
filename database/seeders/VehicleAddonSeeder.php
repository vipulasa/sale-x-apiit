<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleAddonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicle_addons = [
            [
                'manufacturer_id' => 1,
                'vehicle_model_id' => 1,
                'name' => 'Audio system',
                'value' => 100,
                'description' => 'Audio system',
                'is_active' => 'is_active',
            ],
            [
                'manufacturer_id' => 1,
                'vehicle_model_id' => 1,
                'name' => 'Camera system',
                'value' => 400,
                'description' => 'Audio system',
                'is_active' => 'is_active',
            ]
        ];

        foreach ($vehicle_addons as $vehicle_addon) {
            \App\Models\VehicleAddon::create($vehicle_addon);
        }
    }
}
