<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'nama_peserta',
        'email',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}

