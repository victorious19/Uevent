<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $format = ['conference','lecture','workshop','fest'];
        return [
            'user_id' => rand(1,10),
            'tickets' => rand(100, 2000),
            'date' => (new \DateTime())->add(new \DateInterval('P1W'.rand(1,100).'D'))->format('d.m.y'),
            'price' => rand(0, 5000),
            'format' => $format[rand(0, 3)],
            'theme_id' => rand(1, 10),
            'description' => Str::random(),
            'location' => $this->faker->address,
            'publishing_date' => date("d.m.y")
        ];
    }
}
