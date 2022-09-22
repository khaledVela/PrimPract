<?php

namespace App\DAO\bll;

use App\DAO\dal\Connection;
use App\DAO\dto\Estudiante;
use PDO;

class EstudianteBLL
{
    public static function insert($nombre, $apellido, $usuario, $contrasena, $semestre, $carrera)
    {
        $conn = new Connection();
        $sql = "INSERT INTO estudiante(nombre,apellido,usuario,contrasena,semestre,carrera_id) 
                VALUES(:varNombres,:varApellidos, :varUsuario, :varContrasena, :varSemestre, :varCarrera)";
        $conn->queryWithParams($sql, array(
            ":varNombres" => $nombre,
            ":varApellidos" => $apellido,
            ":varUsuario" => $usuario,
            ":varContrasena" => $contrasena,
            ":varSemestre" => $semestre,
            ":varCarrera" => $carrera
        ));
    }

    public static function update($nombre, $apellido, $usuario, $contrasena, $semestre, $carrera, $id)
    {
        $conn = new Connection();
        $sql = "UPDATE estudiante 
                SET nombre=:varNombres, apellido=:varApellidos, usuario=:varUsuario, contrasena=:varContrasena, semestre=:varSemestre, carrera_id=:varCarrera 
                WHERE id =:varId";
        $conn->queryWithParams($sql, array(
            ":varNombres" => $nombre,
            ":varApellidos" => $apellido,
            ":varUsuario" => $usuario,
            ":varContrasena" => $contrasena,
            ":varSemestre" => $semestre,
            ":varCarrera" => $carrera,
            ":varId" => $id
        ));
    }

    public static function delete($id)
    {
        $conn = new Connection();
        $sql = "DELETE FROM estudiante
                WHERE id =:varId";
        $conn->queryWithParams($sql, array(
            ":varId" => $id
        ));
    }

    public static function selectAll(): array
    {
        $conn = new Connection();
        $sql = "SELECT * FROM estudiante";
        $res = $conn->query($sql);
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $obj = self::rowToDto($row);
            $lista[] = $obj;
        }
        return $lista;
    }

    public static function selectById($id): ?Estudiante
    {
        $conn = new Connection();
        $sql = "SELECT * FROM estudiante WHERE id =:varID";
        $res = $conn->queryWithParams($sql, array(":varID" => $id));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $obj = self::rowToDto($row);
        return $obj;
    }

    private static function rowToDto($row): Estudiante
    {
        $objPersona = new Estudiante();
        $objPersona->setId($row["id"]);
        $objPersona->setNombre($row["nombre"]);
        $objPersona->setApellido($row["apellido"]);
        $objPersona->setUsuario($row["usuario"]);
        $objPersona->setContraseña($row["contrasena"]);
        $objPersona->setSemestre($row["semestre"]);
        $objPersona->setCarrera($row["carrera_id"]);
        return $objPersona;
    }
}