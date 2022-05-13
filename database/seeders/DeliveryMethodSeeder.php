<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryMethods = [
            [
                'name' => 'Delivery',
                'description' => 'Delivery',
                'is_active' => true,
            ],
            [
                'name' => 'Pickup',
                'description' => 'Pickup',
                'is_active' => true,
            ],
            [
                'name' => 'Self Pickup',
                'description' => 'Self Pickup',
                'is_active' => true,
            ]
        ];

        foreach ($deliveryMethods as $deliveryMethod) {
            \App\Models\DeliveryMethod::create($deliveryMethod);
        }
    }
}
