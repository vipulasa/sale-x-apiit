<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'manufacturer_id' => 1,
                'vehicle_model_id' => 1,
                'name' => 'Corolla 1.6 VVT-i 5-Speed Manual Transmission',
                'summary' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat egestas faucibus. Cras elementum dui sed leo dapibus, ut pharetra lectus tempor.',
                'price' => 1500000,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat egestas faucibus. Cras elementum dui sed leo dapibus, ut pharetra lectus tempor. Ut tincidunt nisi quis tortor congue consequat. Mauris sit amet ante at odio aliquam malesuada id non dui. Mauris mollis erat a nibh varius, sit amet rhoncus nisi volutpat. Fusce et lacus ac nisi ultrices sagittis volutpat ac leo. Cras tortor tellus, venenatis condimentum tellus id, vulputate pharetra risus. ',
                'is_active' => 1,
                'is_featured' => 1,
                'sort_order' => 0,
            ],

            [
                'manufacturer_id' => 1,
                'vehicle_model_id' => 2,
                'name' => 'Camry 1.6 VVT-i 5-Speed Manual Transmission',
                'summary' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat egestas faucibus. Cras elementum dui sed leo dapibus, ut pharetra lectus tempor.',
                'price' => 2500000,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat egestas faucibus. Cras elementum dui sed leo dapibus, ut pharetra lectus tempor. Ut tincidunt nisi quis tortor congue consequat. Mauris sit amet ante at odio aliquam malesuada id non dui. Mauris mollis erat a nibh varius, sit amet rhoncus nisi volutpat. Fusce et lacus ac nisi ultrices sagittis volutpat ac leo. Cras tortor tellus, venenatis condimentum tellus id, vulputate pharetra risus. ',
                'is_active' => 1,
                'is_featured' => 1,
                'sort_order' => 0,
            ],

            [
                'manufacturer_id' => 1,
                'vehicle_model_id' => 3,
                'name' => 'Prius 1.2 Hybrid',
                'summary' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat egestas faucibus. Cras elementum dui sed leo dapibus, ut pharetra lectus tempor.',
                'price' => 3500000,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat egestas faucibus. Cras elementum dui sed leo dapibus, ut pharetra lectus tempor. Ut tincidunt nisi quis tortor congue consequat. Mauris sit amet ante at odio aliquam malesuada id non dui. Mauris mollis erat a nibh varius, sit amet rhoncus nisi volutpat. Fusce et lacus ac nisi ultrices sagittis volutpat ac leo. Cras tortor tellus, venenatis condimentum tellus id, vulputate pharetra risus. ',
                'is_active' => 1,
                'is_featured' => 1,
                'sort_order' => 0,
            ]
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
