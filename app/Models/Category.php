<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Movie;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function movie()
    {
        return $this->hasMany(Movie::class, 'category_id', 'id')->orderby('id', 'DESC');
    }
}
