<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function gambar()
    {
        return $this->belongsTo(Gambar::class, 'gambar_id');
    }

    public function market()
    {
        return $this->belongsTo(Market::class, 'market_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
