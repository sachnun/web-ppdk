<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "kode_pegawai" => $this->faker->unique()->randomNumber(5),
            "nama_lengkap" => $this->faker->name,
            "username" => $this->faker->unique()->userName,
            "password" => bcrypt('123'),
            "role" => "pegawai"
        ];
    }
}
