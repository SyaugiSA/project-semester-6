<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khatib extends Model
{
    use HasFactory;

    protected $table = "khatibs";
    protected $fillable = [
        'nama',
        'khatib_profile_path',
];




    public function jadwal_khatibs(){
       return $this->hasMany(jadwal_khatib::class);
    }
}
