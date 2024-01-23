<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'role' =>  'owner',
            'no_phone' => fake()->phoneNumber(),
            'addressLine1'=>$this->faker->township(),
            'addressLine2'=>$this->faker->townState(),
            'addressLine3' => 'Malaysia',
            'remember_token' => Str::random(10),
        ];
    }
}
