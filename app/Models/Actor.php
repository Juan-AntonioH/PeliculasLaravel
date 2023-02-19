<?php

namespace App\Models;

use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actor extends Model
{
    use HasFactory;
    public function pelicula()
    {
        return $this->belongsToMany(Pelicula::class);
    }
}
