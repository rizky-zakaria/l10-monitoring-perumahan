<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kawasan()
    {
        return $this->belongsTo(Kawasan::class, 'kawasan_id');
    }
}
