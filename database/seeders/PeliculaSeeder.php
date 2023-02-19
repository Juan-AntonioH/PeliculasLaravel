<?php

namespace Database\Seeders;

use App\Models\Director;
use App\Models\Pelicula;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $directores = Director::all();
        $directores->each(function ($director) {
            Pelicula::factory()->count(3)->create([
                'director_id' => $director->id
            ]);
        });
    }
}
