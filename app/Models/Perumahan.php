<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kawasan()
    {
        return $this->belongsTo(Kawasan::class, 'kawasan_id');
    }

    public function biodata()
    {
        return $this->hasMany(Biodata::class);
    }
}
