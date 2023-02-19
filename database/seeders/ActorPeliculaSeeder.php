<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\ActorPelicula;
use App\Models\Pelicula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActorPeliculaSeeder extends Seeder
{
    private $actores;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peliculas = Pelicula::all();

        // Populate the pivot table
        Actor::all()->each(function ($actor) use ($peliculas) {
            $actor->pelicula()->attach(
                $peliculas->random(rand(1, 3))->pluck('id')->toArray()
            );
        });



    //     $peliculas = Pelicula::all();
    //     $this->actores = Actor::all()->toArray();
    //     $peliculas->each(function ($pelicula) {
    //         $array = [];
    //         for ($i = 1; $i <= 5; $i++) {
    //             $num_aleatorio = rand(1, count($this->actores));

    //             if (!in_array($num_aleatorio,$array)) {
    //                 array_push($array, $num_aleatorio);
    //                 ActorPelicula::factory()->count(1)->create([
    //                     'actor_id' => $num_aleatorio,
    //                     'pelicula_id' => $pelicula->id
    //                 ]);
    //             };
    //         };
    //     });
    }
}
