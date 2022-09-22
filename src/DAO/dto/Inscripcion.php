<?php

namespace App\DAO\dto;

class Inscripcion
{
private $id;
private $estudiante_id;
private $materia_id;

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
    public function getEstudianteId()
    {
        return $this->estudiante_id;
    }

    /**
     * @param mixed $estudiante_id
     */
    public function setEstudianteId($estudiante_id): void
    {
        $this->estudiante_id = $estudiante_id;
    }

    /**
     * @return mixed
     */
    public function getMateriaId()
    {
        return $this->materia_id;
    }

    /**
     * @param mixed $materia_id
     */
    public function setMateriaId($materia_id): void
    {
        $this->materia_id = $materia_id;
    }

}