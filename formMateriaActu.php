<?php
require_once "config.php";
include_once "Components/header.php";

use \App\DAO\bll\MateriaBLL;

$id = $_GET["id"];
$objPersona = MateriaBLL:: selectById($id);

?>

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-4">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-title">
                        Formulario Materia
                    </div>
                    <form method="post" action="tablaMateria.php">
                        <input type="hidden" name="id" value="<?php echo $id?>"/>
                        <input type="hidden" name="task" value="UPDATE"/>
                        <div>
                            <label>Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $objPersona->getNombre()?>">
                        </div>
                        <div>
                            <label>Semestre:</label>
                            <input type="number" name="semestre" class="form-control" value="<?php echo $objPersona->getSemestre()?>">
                        </div>
                        <div>
                            <label>Carrera:</label>
                            <input type="number" name="carrera" class="form-control" value="<?php echo $objPersona->getCarreraId()?>">
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
