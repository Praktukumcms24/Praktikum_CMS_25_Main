<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        // Buat 10 pelanggan dummy
        Pelanggan::factory()->count(10)->create();
    }
}
