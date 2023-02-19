<?php

namespace Src\DTO;

use App\Models\Director;
use JsonSerializable;

class PeliculasDTO implements JsonSerializable
{
    function __construct(private ?int $id, private string $titulo, private int $anyo, private int $duracion,private int $director_id)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->anyo = $anyo;
        $this->duracion = $duracion;
        $this->director_id=$director_id;
    }
    public function id(): int
    {
        return $this->id;
    }
    public function titulo(): string
    {
        return $this->titulo;
    }
    public function anyo(): int
    {
        return $this->anyo;
    }
    public function duracion(): int
    {
        return $this->duracion;
    }
    public function director_id():int{
        return $this->director_id;
    }


	/**
	 * Especifica los datos que deberían serializarse para JSON
	 * Serializa el objeto a un valor que puede ser serializado de forma nativa por json_encode().
	 * @return mixed Devuelve los datos que pueden ser serializados por json_encode(), los cuales son un valor de cualquier tipo distinto de `resource`.
	 */
	public function jsonSerialize() {
        return[
            "id"=> $this->id,
            "titulo"=>$this->titulo,
            "anyo"=>$this->anyo,
            "duracion"=>$this->duracion,
            "director_id"=>$this->director_id,
            "director_name"=>Director::findOrFail($this->director_id)->nombre
        ];
	}
}
