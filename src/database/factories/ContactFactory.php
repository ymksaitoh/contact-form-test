<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use App\Models\Category;

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
            'last_name' => $this->faker->lastname,
            'first_name' => $this->faker->firstname,
            'gender' => $this->faker->randomElement([0, 1, 2]),
            'email' => $this->faker->email,
            'tel_area_code' => $this->faker->numberBetween(1,5),
            'tel_local_number' => $this->faker->numberBetween(1,5),
            'tel_sub_number' => $this->faker->numberBetween(1,5),
            'address' => $this->faker->address,
            'building' => $this->faker->optional()->word,
            'detail' => $this->faker->text(120),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
