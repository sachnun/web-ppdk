<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permohonan>
 */
class PermohonanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = fake()->randomElement(['Diterima', 'Ditolak', 'Tertunda']);
        return [
            'kode_pelayanan' => fake()->unique()->randomNumber(8),
            'jenis_pelayanan' => fake()->randomElement(['Baru', 'Perpanjangan']),
            'jenis_profesi' => fake()->randomElement(['Bidan', 'Dokter', 'Perawat']),
            'tanggal_pengajuan' => fake()->dateTimeBetween('-1 years', 'now'),
            'status' => $status,
            // null if status is 'Tertunda'
            'tanggal_peninjauan' => $status === 'Tertunda' ? null : fake()->dateTimeBetween('-1 years', 'now'),
            'nama_lengkap' => fake()->name(),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->dateTimeBetween('-50 years', '-20 years'),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'lulusan' => fake()->dateTimeBetween('-10 years', 'now'),
            'nomor_str' => fake()->unique()->randomNumber(8),
            'tempat_bekerja_sebelumnya' => fake()->address(),
            'alamat_rumah' => fake()->address(),
            'nomor_hp' => fake()->phoneNumber(),
        ];
    }
}
