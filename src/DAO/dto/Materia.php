<?php

namespace App\DAO\dto;

class Materia
{
    private $id;
    private $nombre;
    private $semestre;
    private $carrera_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * @param mixed $semestre
     */
    public function setSemestre($semestre): void
    {
        $this->semestre = $semestre;
    }

    /**
     * @return mixed
     */
    public function getCarreraId()
    {
        return $this->carrera_id;
    }

    /**
     * @param mixed $carrera_id
     */
    public function setCarreraId($carrera_id): void
    {
        $this->carrera_id = $carrera_id;
    }


}