<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers>
 */
class CustomersFactory extends Factory
{
    protected $model = Customers::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(15),
            'phone' => $this->faker->sentence(12),
            'address' => $this->faker->sentence(20),

        ];
    }
}
