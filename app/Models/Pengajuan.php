<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pengajuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'id_telegram',

    ];

    public function getCreatedAtAtrribute()
    {
        return Carbon::parse($this->Attribute['çreated_at'])->translatedFormat('1, d F Y');
    }
}
