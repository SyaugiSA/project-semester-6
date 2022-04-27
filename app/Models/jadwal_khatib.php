<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal_khatib extends Model
{
    use HasFactory;

    protected $table = "jadwal_khatibs";
    protected $fillable = [
        'tanggal',
        'khatib_id',
    ];
    protected $dates = [
        'tanggal',
    ];



    public function khatib()
    {
      return  $this->belongsTo(khatib::class);
    }
}
