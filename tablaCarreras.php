<?php
require_once "config.php";

use App\dao\bll\CarreraBLL;
$task="select";
if(isset($_REQUEST["task"])){
    $task=$_REQUEST["task"];
}
switch ($task){
    case "INSERT":
        $nombre = $_POST["nombre"];
        CarreraBLL::insert($nombre);
        break;
    case "UPDATE":
        $id=$_POST["id"];
        $nombre = $_POST["nombre"];
        CarreraBLL::update($nombre, $id);
        break;
    case "DELETE":
        $id = $_GET["id"];
        CarreraBLL::delete($id);
        break;
}

$listaMateria = CarreraBLL::selectAll();
include_once "Components/header.php";
?>

<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($listaMateria as $objpersona): ?>
        <tr>
            <td><?php echo $objpersona->getId() ?></td>
            <td><?php echo $objpersona->getNombre() ?></td>
            <td><a
                    class="btn btn-primary"
                    href="formCarreraActu.php?id=<?php echo $objpersona->getId(); ?>">Editar

                </a></td>
            <td><a
                    onclick="return confirm('Estas seguro de eliminarlo?')"
                    class="btn btn-danger"
                    href="tablaCarreras.php?id=<?php echo $objpersona->getId(); ?>&task=DELETE">Eliminar

                </a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include_once "Components/footer.php" ?>

