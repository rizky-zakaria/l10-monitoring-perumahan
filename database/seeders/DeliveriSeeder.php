<?php

namespace Database\Seeders;

use App\Models\Deliveri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 4; $i++) {
            Deliveri::create([
                'transaksi_id' => $i,
                'user_id' => 5,
                'status' => 'market'
            ]);
        }
    }
}
