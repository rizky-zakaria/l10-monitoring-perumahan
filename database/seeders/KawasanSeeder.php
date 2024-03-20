<?php

namespace Database\Seeders;

use App\Models\Kawasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KawasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alamat = [
            'Jln. Pantai Indah Kapuk, Jakarta Utara',
            'Jln. Nagroaceh, Jakarta Selatan',
            'Jln. Pattimura, Jakarta Timur'
        ];
        for ($i = 0; $i < 3; $i++) {
            Kawasan::create([
                'kawasan' => 'Kawasan ' . $i,
                'alamat' => $alamat[$i]
            ]);
        }

        Kawasan::create([
            'kawasan' => 'Global',
            'alamat' => 'Global'
        ]);
    }
}
