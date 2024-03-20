<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kawasan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(MarketSeeder::class);
        $this->call(KawasanSeeder::class);
        $this->call(MemberSeeder::class);
    }
}
