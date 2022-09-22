<?php

namespace App\DAO\bll;

use App\DAO\dal\Connection;
use App\DAO\dto\Materia;
use PDO;

class MateriaBLL
{
    public static function insert($nombre, $semestre, $carrera_id)
    {
        $conn = new Connection();
        $sql = "INSERT INTO materia(nombre,semestre,carrera_id) 
                VALUES(:varNombres, :varSemestre, :varCarreraId)";
        $conn->queryWithParams($sql, array(
            ":varNombres" => $nombre,
            ":varSemestre" => $semestre,
            ":varCarreraId" => $carrera_id
        ));
    }

    public static function update($nombre, $semestre, $carrera_id, $id)
    {
        $conn = new Connection();
        $sql = "UPDATE materia 
                SET nombre=:varNombres,semestre=:varSemestre, carrera_id=:varCarreraId 
                WHERE id =:varId";
        $conn->queryWithParams($sql, array(
            ":varNombres" => $nombre,
            ":varSemestre" => $semestre,
            ":varCarreraId" => $carrera_id,
            ":varId"=>$id
        ));
    }
    public static function delete($id)
    {
        $conn = new Connection();
        $sql = "DELETE FROM materia
                WHERE id =:varId";
        $conn->queryWithParams($sql, array(
            ":varId"=>$id
        ));
    }
    public static function selectAll():array{
        $conn = new Connection();
        $sql = "SELECT * FROM materia";
        $res= $conn->query($sql);
        while ($row = $res->fetch(PDO::FETCH_ASSOC)){
            $obj = self::rowToDto($row);
            $lista[]=$obj;
        }
        return $lista;
    }
    public static function selectbyCarrera($carrera_id,$semestre):array{
        $conn = new Connection();
        $sql = "SELECT * FROM materia 
                WHERE carrera_id=:varCarrera
                and semestre=:varSemestre";
        $res= $conn->queryWithParams($sql,array(
            ":varSemestre"=>$semestre,
            ":varCarrera"=>$carrera_id
        ));
        while ($row = $res->fetch(PDO::FETCH_ASSOC)){
            $obj = self::rowToDto($row);
            $lista[]=$obj;
        }
        return $lista;
    }

    public static function selectById($id):?Materia {
        $conn = new Connection();
        $sql = "SELECT * FROM materia WHERE id =:varID";
        $res= $conn->queryWithParams($sql,array(":varID"=>$id));
        if($res->rowCount()==0){
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $obj = self::rowToDto($row);
        return $obj;
    }

    private static function rowToDto($row):Materia{
        $objPersona = new Materia();
        $objPersona->setId($row["id"]);
        $objPersona->setNombre($row["nombre"]);
        $objPersona->setSemestre($row["semestre"]);
        $objPersona->setCarreraId($row["carrera_id"]);
        return $objPersona;
    }
}