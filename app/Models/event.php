<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $table = "events";
    protected $fillable = [
        'judul',
        'tanggal',
        'deskripsi',  
];
protected $dates = [
    'tanggal',
];

    public function photo(){
        return $this->hasMany(photo_event::class);
    }
}


