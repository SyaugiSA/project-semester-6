<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatans';

    protected $fillable = [
      'jabatan',
];


    public function takmirs(){
        return $this->hasMany(takmir::class,'jabatan_id');
    }


}
