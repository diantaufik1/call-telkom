<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'rating',
        'name_pelanggan',
        'jenis_layanan',
        'komentar',
        'tanggal_k',
    ];
}
