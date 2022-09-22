<?php include_once "Components/header.php" ?>

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-4">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-title">
                        Formulario Materia
                    </div>
                    <form method="post" action="tablaMateria.php">
                        <input type="hidden" name="task" value="INSERT"/>
                        <div>
                            <label>Nombre:</label>
                            <input type="text" name="nombre" class="form-control">
                        </div>
                        <div>
                            <label>Semestre:</label>
                            <input type="number" name="semestre" class="form-control">
                        </div>
                        <div>
                            <label>Carrera:</label>
                            <input type="number" name="carrera" class="form-control">
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
