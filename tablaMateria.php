<?php
require_once "config.php";

use App\dao\bll\MateriaBLL;
use App\dao\bll\CarreraBLL;

$task="select";
if(isset($_REQUEST["task"])){
    $task=$_REQUEST["task"];
}
switch ($task){
    case "INSERT":
        $nombre = $_POST["nombre"];
        $semestre = $_POST["semestre"];
        $carrera_id = $_POST["carrera"];
        MateriaBLL::insert($nombre, $semestre, $carrera_id);
        break;
    case "UPDATE":
        $id=$_POST["id"];
        $nombre = $_POST["nombre"];
        $semestre = $_POST["semestre"];
        $carrera_id = $_POST["carrera"];
        MateriaBLL::update($nombre, $semestre, $carrera_id, $id);
        break;
    case "DELETE":
        $id = $_GET["id"];
        MateriaBLL::delete($id);
        break;
}

$listaMateria = MateriaBLL::selectAll();
include_once "Components/header.php";
?>

<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Semestre</th>
        <th>Carrera</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach ($listaMateria as $objpersona):
        $objmat=\App\DAO\bll\CarreraBLL::selectById($objpersona->getCarreraId())
    ?>
        <tr>
            <td><?php echo $objpersona->getId() ?></td>
            <td><?php echo $objpersona->getNombre() ?></td>
            <td><?php echo $objpersona->getSemestre() ?></td>
            <td><?php echo $objmat->getNombre() ?></td>
            <td><a
                    class="btn btn-primary"
                    href="formMateriaActu.php?id=<?php echo $objpersona->getId(); ?>">Editar

                </a></td>
            <td><a
                    onclick="return confirm('Estas seguro de eliminarlo?')"
                    class="btn btn-danger"
                    href="tablaMateria.php?id=<?php echo $objpersona->getId(); ?>&task=DELETE">Eliminar

                </a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include_once "Components/footer.php" ?>

