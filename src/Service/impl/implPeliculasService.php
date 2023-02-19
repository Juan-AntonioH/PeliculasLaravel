<?php
namespace Src\Service\impl;

use App\Models\Pelicula;
use Src\DTO\PeliculasDTO;
use Src\DAO\IPeliculasDAO;
use Illuminate\Http\Request;
use Src\DAO\impl\ImplPeliculasDAO;
use Src\Service\IPeliculasService;

class ImplPeliculasService implements IPeliculasService{
    private IPeliculasDAO $peliculaDAO;

    function __construct(){
        $this->peliculaDAO = new ImplPeliculasDAO();
    }

	/**
	 * @return array
	 */
	public function all(): array {
        return $this->peliculaDAO->all();
	}

	/**
	 *
	 * @param mixed $id
	 * @return \Src\DTO\PeliculasDTO
	 */
	public function find($id): PeliculasDTO {
        return $this->peliculaDAO->find($id);
	}

    public function actores($id): array{
        return $this->peliculaDAO->actores($id);
    }

	/**
	 *
	 * @param mixed $id
	 * @return array
	 */
	public function findByUser($id): array {
        $pepe = [];
        return $pepe;
	}

	/**
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return bool
	 */
	public function insert(PeliculasDTO $pelicula): bool {
        return $this->peliculaDAO->insert($pelicula);
	}

	/**
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param mixed $id
	 * @return array
	 */
	public function update(PeliculasDTO $pelicula, $id): PeliculasDTO
    {
        return $this->peliculaDAO->update($pelicula,$id);
    }
	/**
	 *
	 * @param mixed $id
	 * @return bool
	 */
	public function delete($id): bool {
        return 0;
	}
}
