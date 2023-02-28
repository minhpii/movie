<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;

    public $timestamp = false;

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
