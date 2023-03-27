<?php include("../../database.php");

if (isset($_GET['textID'])) {
    $textID = (isset($_GET['textID']) ? $_GET['textID'] : "");
    $sentencia = $conn->prepare("SELECT * FROM `caracteristicas` where id_puesto = :id ;");
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();
    $caracteristica = $sentencia->fetch(PDO::FETCH_LAZY);
    $puesto = $caracteristica["puesto"];
}

if ($_POST) {
    $id = (isset($_POST['id']) ? $_POST['id'] : "");
    $nombrepuesto = (isset($_POST['nombrepuesto']) ? $_POST['nombrepuesto'] : "");
    $sentencia = $conn->prepare("UPDATE `caracteristicas` SET `puesto` = :puesto
    WHERE `caracteristicas`.`id_puesto` = :id;");
    $sentencia->bindParam(":puesto", $nombrepuesto);
    $sentencia->bindParam(":id", $id);
    $sentencia->execute();
    header("Location:index.php");
}

?>


<?php include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        Editar Puestos
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" value="<?php echo $textID; ?>" 
                 class="form-control" readonly name="id"
                    id="id" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="nombrepuesto" class="form-label">Nombre Puesto</label>
                <input type="text" value="<?php echo $puesto; ?>" class="form-control" name="nombrepuesto"
                    id="nombrepuesto" aria-describedby="helpId" placeholder="">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-danger" href="<?php echo $url_base; ?>/modules/caracteristicas/index.php"
                role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>

<?php include("../../templates/footer.php"); ?>