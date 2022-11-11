<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date_of_incident' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'Asia/Manila'),
            'type' => $this->faker->randomElement($array = array('disorderly conduct', 'public scandal', 'harassment', 'drunkenness', 'vandalism', 'gambling')),
            'street' => $this->faker->randomElement($array = array('Arlegui St.', 'Castillejos St.', 'Duque St.', 'Farnecio St.', 'Fraternal St.', 'Pascual Casal St.', 'Pax St.', 'Vergara St.')),
            'location' => $this->faker->streetAddress,
            'persons' => $this->faker->name(),
            'narrative' => $this->faker->text($maxNbChars = 50),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'Asia/Manila'),
            'updated_at' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'Asia/Manila'),
            'remarks' => $this->faker->text($maxNbChars = 25),
            'status' => $this->faker->randomElement($array = array('PENDING', 'ON-GOING', 'COMPLETED')),
        ];
    }
}
