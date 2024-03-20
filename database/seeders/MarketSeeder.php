<?php

namespace Database\Seeders;

use App\Models\Market;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 3; $i++) {
            Market::create([
                'nama' => 'Market ' . $i,
                'kawasan_id' => $i + 1,
                'jenis' => 'market'
            ]);
        }
        Market::create([
            'nama' => 'Global Market',
            'kawasan_id' => 4,
            'jenis' => 'global'
        ]);
    }
}
