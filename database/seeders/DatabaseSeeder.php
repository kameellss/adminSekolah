<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MataPelajaran;
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

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'adminSekolah@gmail.com',
            'password'=>"admin123"
        ]);

        MataPelajaran::create([
            "nama_pelajaran" => "Informatika"
        ]);
        MataPelajaran::create([
            "nama_pelajaran" => "Matematika"
        ]);
        MataPelajaran::create([
            "nama_pelajaran" => "Produk Kreatif dan Kewirausahaan"
        ]);
    }
}
