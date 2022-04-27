<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saldo extends Model
{
    use HasFactory;

    protected $table = "saldos";

    protected $fillable = [
        'keterangan',
        'saldo',
        'tanggal',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
