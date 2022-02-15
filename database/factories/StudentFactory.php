<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            'name_student' => $this->faker->name(),
            'fisrt_name' => $this->faker->name(),
            'kind' => $this->faker->name(),
            'registration_number' => $this->faker->name(),
            // 'image_url' => $this->faker->name(),
        ];
    }
}
