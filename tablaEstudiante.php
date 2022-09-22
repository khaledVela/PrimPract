<?php
require_once "config.php";

use App\dao\bll\EstudianteBLL;

$task = "select";
if (isset($_REQUEST["task"])) {
    $task = $_REQUEST["task"];
}
switch ($task) {
    case "INSERT":
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $semestre = $_POST["semestre"];
        $carrera_id = $_POST["carrera_id"];
        EstudianteBLL::insert($nombre, $apellido, $usuario, $contrasena, $semestre, $carrera_id);
        break;
    case "UPDATE":
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $semestre = $_POST["semestre"];
        $carrera_id = $_POST["carrera_id"];
        EstudianteBLL::update($nombre, $apellido, $usuario, $contrasena, $semestre, $carrera_id, $id);
        break;
    case "DELETE":
        $id = $_GET["id"];
        EstudianteBLL::delete($id);
        break;
}

$listaPersonas = EstudianteBLL::selectAll();
include_once "Components/header.php";
?>

<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Usuario</th>
        <th>contraseña</th>
        <th>Semestre</th>
        <th>Carrera</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach ($listaPersonas as $objpersona):
            $objmat=\App\DAO\bll\CarreraBLL::selectById($objpersona->getCarrera())
    ?>
        <tr>
            <td><?php echo $objpersona->getId() ?></td>
            <td><?php echo $objpersona->getNombre() ?></td>
            <td><?php echo $objpersona->getApellido() ?></td>
            <td><?php echo $objpersona->getUsuario() ?></td>
            <td><?php echo $objpersona->getContraseña() ?></td>
            <td><?php echo $objpersona->getSemestre() ?></td>
            <td><?php echo $objmat->getNombre()?></td>
            <td><a
                        class="btn btn-primary"
                        href="formEstudianteActu.php?id=<?php echo $objpersona->getId(); ?>">Editar

                </a></td>
            <td><a
                        onclick="return confirm('Estas seguro de eliminarlo?')"
                        class="btn btn-danger"
                        href="tablaEstudiante.php?id=<?php echo $objpersona->getId(); ?>&task=DELETE">Eliminar

                </a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include_once "Components/footer.php" ?>

