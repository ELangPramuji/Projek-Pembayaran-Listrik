<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataPelanggan>
 */
class DataPelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => 'Yan Elang',
            // 'email' => 'elangpramuji@gmail.com',
            // 'email_verified_at' => now(),
            // 'password' => static::$password ??= Hash::make(123),
            // 'remember_token' => Str::random(10),
            'name' => fake()->name(),
            'email' => fake()->email(),
            'no_meteran' => fake()->bothify('??##-##??-???#-##?#'),
            'telepon' => fake()->phoneNumber(),
            'alamat' => fake()->address(),


        ];
    }
}
