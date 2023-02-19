<?php

namespace App\Models;

use App\Models\Actor;
use App\Models\Director;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelicula extends Model
{
    use HasFactory;
    public function Actor()
    {
        return $this->belongsToMany(Actor::class);
    }
    public function director()
    {
        return $this->belongsTo(Director::class);
    }
}
