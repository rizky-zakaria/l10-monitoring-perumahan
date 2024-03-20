<?php

namespace Database\Seeders;

use App\Models\Biodata;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Biodata::create([
            'user_id' => 5,
            'id_member' => rand(0, 9999),
            'nik' => rand(1111111111111111, 9999999999999999),
            'jk' => 'pria',
            'nomor_rumah' => rand(1, 50),
            'kawasan_id' => rand(1, 3)
        ]);
    }
}
