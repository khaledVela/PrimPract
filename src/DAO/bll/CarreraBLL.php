<?php

namespace App\DAO\bll;

use App\DAO\dal\Connection;
use App\DAO\dto\Carrera;
use App\DAO\dto\Estudiante;
use PDO;

class CarreraBLL
{
    public static function insert($nombre)
    {
        $conn = new Connection();
        $sql = "INSERT INTO carrera(nombre) 
                VALUES(:varNombres)";
        $conn->queryWithParams($sql, array(
            ":varNombres" => $nombre
        ));
    }
    public static function update($nombre, $id)
    {
        $conn = new Connection();
        $sql = "UPDATE carrera 
                SET nombre=:varNombres
                WHERE id =:varId";
        $conn->queryWithParams($sql, array(
            ":varNombres" => $nombre,
            ":varId"=>$id
        ));
    }
    public static function delete($id)
    {
        $conn = new Connection();
        $sql = "DELETE FROM carrera
                WHERE id =:varId";
        $conn->queryWithParams($sql, array(
            ":varId"=>$id
        ));
    }
    public static function selectAll():array{
        $conn = new Connection();
        $sql = "SELECT * FROM carrera";
        $res= $conn->query($sql);
        while ($row = $res->fetch(PDO::FETCH_ASSOC)){
            $obj = self::rowToDto($row);
            $lista[]=$obj;
        }
        return $lista;
    }
    public static function selectById($id):?Carrera {
        $conn = new Connection();
        $sql = "SELECT * FROM carrera WHERE id =:varID";
        $res= $conn->queryWithParams($sql,array(":varID"=>$id));
        if($res->rowCount()==0){
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $obj = self::rowToDto($row);
        return $obj;
    }

    private static function rowToDto($row):Carrera{
        $objPersona = new Carrera();
        $objPersona->setId($row["id"]);
        $objPersona->setNombre($row["nombre"]);
        return $objPersona;
    }
}