<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'uuid' => Str::uuid(),
            'shop_id' => 1,
            'shopify_product_id' => 6549307195599,
            'image' => 'https://cdn.shopify.com/s/files/1/0553/3358/5103/products/2dae2f6154b0cb4a8edd03a84f7b7060.jpg?v=1615840580',
        ];
    }
}
