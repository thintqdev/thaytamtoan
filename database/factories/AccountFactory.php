<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'date_of_birth' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber(),
            'bio' => $this->faker->text(200),
            'facebook_url' => $this->faker->url(),
            'province' => $this->faker->text(50),
            'district' => $this->faker->text(50),
            'village' => $this->faker->text(50),
            'school' => $this->faker->text(50)
        ];
    }
}
