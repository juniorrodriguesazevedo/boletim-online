<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'birth_date' => $this->faker->date,
            'sex' => $this->faker->randomElement(['M', 'F']),
            'cpf' => $this->faker->numerify('###########'),
            'rg' => $this->faker->numerify('#########'),
            'birth_certificate' => $this->faker->numerify('###########'),
            'street' => $this->faker->streetName,
            'district' => $this->faker->word,
            'number' => $this->faker->buildingNumber,
            'name_mother' => $this->faker->name,
            'name_father' => $this->faker->name,
            'phone_first' => $this->faker->phoneNumber,
            'phone_second' => $this->faker->phoneNumber,
            'observation' => $this->faker->text,
        ];
    }
}
