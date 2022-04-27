<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kas_masjid extends Model
{
    use HasFactory;
    protected $table = "kas_masjids";
    protected $fillable = [
        'keterangan',
        'pemasukan',
        'pengeluaran',
        'tanggal',
        'jenis',
        'user_id',
];
protected $dates = [
    'tanggal',
];

    /**
     * Get the user that owns the kas_masjid
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
