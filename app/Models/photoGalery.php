<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photoGalery extends Model
{
    use HasFactory;

    protected $table = 'photo_galeries';

    protected $fillable = ['photo_galery_path',];
}
