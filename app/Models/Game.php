<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['game','genre' ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    
}