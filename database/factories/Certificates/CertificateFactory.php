<?php

namespace Database\Factories\Certificates;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'certificate_name' => Str::random(5),
            'certificate_no' => $this->faker->unique()->randomNumber(),
            'test' => Str::random(3),
            'item_1' => Str::random(3),
            'item_2' => Str::random(3),
            'lot_1' => Str::random(3),
            'lot_2' => Str::random(3),
            'slug' => $this->faker->unique()->uuid(),
            'created_at' => $this->faker->dateTimeInInterval('-1 days', '+4 days')
        ];
    }
}
