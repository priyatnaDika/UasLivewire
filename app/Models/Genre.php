<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    protected $fillable = ['genres','id'];

    public function game()
    {
        return $this->hasMany(Game::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}