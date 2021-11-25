<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Company'.$this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'location' => 'location'.Str::random(10),
        ];
    }
}
