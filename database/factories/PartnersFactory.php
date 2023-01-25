<?php

namespace Database\Factories;

use App\Models\Partners;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partners::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'partner_name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'partner_email' => $this->faker->email,
            'partner_number' => $this->faker->phoneNumber,
            'logo' => $this->faker->imageUrl
        ];
    }
}
