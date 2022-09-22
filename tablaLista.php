<?php
require_once "config.php";

use App\dao\bll\InscripcionBLL;

use App\dao\bll\EstudianteBLL;

$listaPersonas = EstudianteBLL::selectAll();
$task="select";
if(isset($_REQUEST["task"])){
    $task=$_REQUEST["task"];
}
$usuario = $_GET["username"];
$contrasena = $_GET["password"];
foreach ($listaPersonas as $objpersona):
    if ($usuario == $objpersona->getUsuario() && $contrasena == $objpersona->getContraseña()) {
        $estudiante_id=$objpersona->getId();
        $nombre=$objpersona->getNombre();
        switch ($task){
            case "INSERT":
                $materia =$_GET["materia"];
                InscripcionBLL::insert($estudiante_id,$materia);
                break;
            case "DELETE":
                $id = $_GET["id"];
                InscripcionBLL::delete($id);
                break;
        }
        $listaMateria =InscripcionBLL::selectByAlumno($estudiante_id);
        break;
    }
    else{
        header("index.php");
    }
endforeach;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <title>Personas</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?php echo $nombre?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Materias
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="tablaMateriasUsuario.php?username=<?php echo $usuario?>&password=<?php echo $contrasena?>">Lista de materias</a></li>
                        <li><a class="dropdown-item" href="tablaLista.php?username=<?php echo $usuario?>&password=<?php echo $contrasena?>">Mis materias</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Materia</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($listaMateria as $objpersona):
        $objmat = \App\DAO\bll\MateriaBLL::selectById($objpersona->getMateriaId())
        ?>
        <tr>
            <td><?php echo $objpersona->getId() ?></td>
            <td><?php echo $objmat->getNombre() ?></td>
            <td><a
                    class="btn btn-danger"
                    href="tablaLista.php?id=<?php echo $objpersona->getId(); ?>&alumno=<?php $estudiante_id ?>&username=<?php echo $usuario?>&password=<?php echo $contrasena?>&task=DELETE">Eliminar
                </a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include_once "Components/footer.php" ?>

