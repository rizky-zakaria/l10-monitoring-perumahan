<?php

namespace Database\Seeders;

use App\Models\Gambar;
use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $gambar = Gambar::create([
                'gambar' => 'product' . $i + 1 . '.jpg'
            ]);
            Produk::create([
                'produk' => 'Shampo',
                'harga' => 50000,
                'stok' => 100,
                'gambar_id' => $gambar->id,
                'kategori' => 'market',
                'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis sed facere fugit aperiam atque numquam ea id aspernatur, natus blanditiis quis sequi a magni dignissimos consequatur! Maxime placeat quaerat explicabo itaque provident ipsum nisi dolore sit maiores similique obcaecati, odio nihil quo beatae adipisci illo? Facilis rem repudiandae tempore esse necessitatibus placeat ex molestiae consectetur, saepe officiis id similique, blanditiis pariatur architecto libero adipisci nesciunt veritatis. Debitis quae laborum, libero tempora neque totam quas labore nemo culpa? Ad quisquam iusto esse maxime! Doloribus velit, ea dolorem unde provident natus ut officiis quae nesciunt, eaque, et omnis sunt maxime? Qui iusto aspernatur non asperiores rerum cupiditate! Possimus, aspernatur! Corporis magnam, rem tenetur esse aliquam dignissimos veritatis quisquam pariatur, laboriosam, ut dicta non illum maxime.',
                'ketentuan' => '',
                'market_id' => 1,
            ]);
        }
    }
}
