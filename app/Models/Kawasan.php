<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kawasan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function perumahan()
    {
        return $this->hasMany(Perumahan::class);
    }
}
