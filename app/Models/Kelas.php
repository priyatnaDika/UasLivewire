<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['creator','game','developer'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}