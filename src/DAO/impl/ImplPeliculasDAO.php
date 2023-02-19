<?php

namespace Src\DAO\impl;

use App\Models\Director;
use App\Models\Pelicula;
use Src\DTO\PeliculasDTO;
use Src\DAO\IPeliculasDAO;
use Illuminate\Http\Request;
use Src\DTO\ActorsDTO;

class ImplPeliculasDAO implements IPeliculasDAO
{
    /**
     * @return array
     */
    public function all(): array
    {
        $peliculas =  Pelicula::get()->toArray();

        $resultado = [];

        foreach ($peliculas as $pelicula) {

            $resultado[] = new PeliculasDTO(
                $pelicula["id"],
                $pelicula["titulo"],
                $pelicula["anyo"],
                $pelicula["duracion"],
                $pelicula["director_id"]
            );
        }

        return $resultado;
    }

    /**
     *
     * @param mixed $id
     * @return \Src\DTO\PeliculasDTO
     */
    public function find($id): PeliculasDTO
    {
        $movie = Pelicula::findOrFail($id);
        return new PeliculasDTO($movie->id,$movie->titulo,$movie->anyo,$movie->duracion,$movie->director_id);
    }
    public function actores($id): array{
        $peliculas =  Pelicula::findOrFail($id)->actor;

        $resultado = [];

        foreach ($peliculas as $pelicula) {

            $resultado[] = new ActorsDTO(
                $pelicula->id,
                $pelicula->nombre
            );
        }

        return $resultado;
    }

    /**
     *
     * @param mixed $id
     * @return array
     */
    public function findByUser($id): array
    {
        $pepe = [];
        return $pepe;
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function insert(PeliculasDTO $pelicula): bool
    {
        $director = Director::findOrFail($pelicula->director_id());
        $movie = new Pelicula();
        $movie->titulo = $pelicula->titulo();
        $movie->anyo = $pelicula->anyo();
        $movie->duracion = $pelicula->duracion();
        // $movie->director_id = $pelicula->director_id();
        $movie->director()->associate($director);
        return $movie->save();
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return array
     */
    public function update(PeliculasDTO $pelicula, $id): PeliculasDTO
    {
        $movie = Pelicula::findOrFail($id);
        $movie->titulo = $pelicula->titulo();
        $movie->anyo = $pelicula->anyo();
        $movie->duracion = $pelicula->duracion();
        $movie->save();
        return new PeliculasDTO($movie->id,$movie->titulo,$movie->anyo,$movie->duracion,$movie->director_id);
    }

    /**
     *
     * @param mixed $id
     * @return bool
     */
    public function delete($id): bool
    {
        return 0;
    }
}
