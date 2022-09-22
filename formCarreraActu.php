<?php
require_once "config.php";
include_once "Components/header.php";

use \App\DAO\bll\CarreraBLL;

$id = $_GET["id"];
$objPersona = CarreraBLL:: selectById($id);

?>

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-4">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-title">
                        Formulario Carrera
                    </div>
                    <form method="post" action="tablaCarreras.php">
                        <input type="hidden" name="id" value="<?php echo $id?>"/>
                        <input type="hidden" name="task" value="UPDATE"/>
                        <div>
                            <label>Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $objPersona->getNombre()?>">
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
