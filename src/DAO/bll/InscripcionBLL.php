<?php

namespace App\DAO\bll;

use App\DAO\dal\Connection;
use App\DAO\dto\Inscripcion;
use PDO;

class InscripcionBLL
{
    public static function insert($estudiante_id, $materia_id)
    {
        $conn = new Connection();
        $sql = "INSERT INTO inscripcion(estudiante_id,materia_id) 
                VALUES(:varEstudianteID, :varMateriaID)";
        $conn->queryWithParams($sql, array(
            ":varEstudianteID" => $estudiante_id,
            ":varMateriaID" =>$materia_id
        ));
    }
    public static function update($estudiante_id,$materia_id, $id)
    {
        $conn = new Connection();
        $sql = "UPDATE inscripcion 
                SET estudiante_id=:varEstudianteID,materia_id:=varMateriaID
                WHERE id =:varId";
        $conn->queryWithParams($sql, array(
            ":varEstudianteID" => $estudiante_id,
            ":varMateriaID" =>$materia_id,
            ":varId"=>$id
        ));
    }
    public static function delete($id)
    {
        $conn = new Connection();
        $sql = "DELETE FROM inscripcion
                WHERE id =:varId";
        $conn->queryWithParams($sql, array(
            ":varId"=>$id
        ));
    }
    public static function selectAll():array{
        $conn = new Connection();
        $sql = "SELECT * FROM inscripcion";
        $res= $conn->query($sql);
        while ($row = $res->fetch(PDO::FETCH_ASSOC)){
            $obj = self::rowToDto($row);
            $lista[]=$obj;
        }
        return $lista;
    }
    public static function selectByAlumno($estudianteId):array{
        $conn = new Connection();
        $sql = "SELECT * FROM inscripcion WHERE estudiante_id =:varID";
        $res= $conn->queryWithParams($sql,array(":varID"=>$estudianteId));
        while ($row = $res->fetch(PDO::FETCH_ASSOC)){
            $obj = self::rowToDto($row);
            $lista[]=$obj;
        }
        return $lista;
    }
    public static function selectById($id):?Inscripcion {
        $conn = new Connection();
        $sql = "SELECT * FROM inscripcion WHERE id =:varID";
        $res= $conn->queryWithParams($sql,array(":varID"=>$id));
        if($res->rowCount()==0){
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $obj = self::rowToDto($row);
        return $obj;
    }

    private static function rowToDto($row):Inscripcion{
        $objPersona = new Inscripcion();
        $objPersona->setId($row["id"]);
        $objPersona->setEstudianteId($row["estudiante_id"]);
        $objPersona->setMateriaId($row["materia_id"]);
        return $objPersona;
    }
}