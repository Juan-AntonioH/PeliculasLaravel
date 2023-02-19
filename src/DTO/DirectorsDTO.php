<?php

namespace Src\DTO;
use JsonSerializable;
class DirectorsDTO implements JsonSerializable
{
    function __construct(private ?int $id, private string $nombre)
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }
    public function id(): int
    {
        return $this->id;
    }
    public function nombre(): string
    {
        return $this->nombre;
    }

    public function jsonSerialize() {
        return[
            "id"=> $this->id,
            "nombre"=>$this->nombre
        ];
	}
}
