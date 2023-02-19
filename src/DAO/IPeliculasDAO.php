<?php

namespace Src\DAO;

use Src\DTO\PeliculasDTO;
use Illuminate\Http\Request;


interface IPeliculasDAO
{
    public function all(): array;
    public function find($id): PeliculasDTO;
    public function actores($id): array;
    public function findByUser($id): array;
    public function insert(PeliculasDTO $pelicula): bool;
    public function update(PeliculasDTO $request, $id): PeliculasDTO;
    public function delete($id): bool;
}
