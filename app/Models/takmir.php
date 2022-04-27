<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class takmir extends Model
{
    use HasFactory;
    protected $table = 'takmirs';

    protected $fillable = [
        'nama',
        'nomor',
        'alamat',  
        'jabatan_id',
];

public function jabatan(){
    return $this->belongsTo(jabatan::class);
}
}
