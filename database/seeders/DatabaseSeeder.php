<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // create user manually
        \App\Models\User::create([
            "kode_pegawai" => "12345",
            "nama_lengkap" => "Administrator",
            "username" => "admin",
            "password" => "123",
            "role" => "admin"
        ]);

        // factory user
        \App\Models\User::factory(10)->create();

        // factory permohonan
        \App\Models\Permohonan::factory(50)->create();
    }
}
