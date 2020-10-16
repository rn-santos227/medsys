<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ref_code' => 'U0000000000',
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => 'admin@lightbp.com',
            'email_verified_at' => now(),
            'password' => 'secret',
            'remember_token' => Str::random(10),
        ];
    }
}
