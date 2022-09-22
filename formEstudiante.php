<?php
require_once "config.php";
include_once "Components/header.php";

use \App\DAO\bll\EstudianteBLL;

$id = $_GET["id"];
$objPersona = EstudianteBLL:: selectById($id);
?>

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-4">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-title">
                        Formulario Alumno
                    </div>
                    <form method="post" action="tablaEstudiante.php">
                        <input type="hidden" name="id" value="<?php echo $id ?>"/>
                        <input type="hidden" name="task" value="INSERT"/>
                        <div>
                            <label>Nombre:</label>
                            <input type="text" name="nombre" class="form-control">
                        </div>
                        <div>
                            <label>Apellido:</label>
                            <input type="text" name="apellido" class="form-control">
                        </div>
                        <div>
                            <label>Usuario:</label>
                            <input type="number" name="usuario" class="form-control">
                        </div>
                        <div>
                            <label>Contraseña:</label>
                            <input type="text" name="contrasena" class="form-control">
                        </div>
                        <div>
                            <label>Semestre:</label>
                            <input type="number" name="semestre" class="form-control">
                        </div>
                        <div>
                            <label>Carrera:</label>
                            <input type="number" name="carrera_id" class="form-control">
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary" type="submit"> Guardar</button>
                            <button class="btn btn-secondary"> Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "Components/footer.php" ?>
