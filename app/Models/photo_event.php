<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photo_event extends Model
{
    use HasFactory;
    protected $table = "photo_events";
    protected $fillable = [
        'photo_event_path',
        'event_id',  
];

    public function event(){
        return $this->belongsTo(event::class);
    }
}
