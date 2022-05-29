<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1, 2),
            'email' => $this->faker->safeEmail,
            'postcode' => substr_replace($this->faker->postcode, '-', 3, 0),
            'address' => substr($this->faker->address, 7),
            'building_name' => $this->faker->secondaryAddress,
            'opinion' => $this->faker->sentence,
        ];
    }
}
