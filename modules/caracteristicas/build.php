<?php include("../../database.php");

if($_POST){
    print_r($_POST);

    $nombrepuesto = (isset($_POST['nombrepuesto'])?$_POST['nombrepuesto']:"");

    $sentencia = $conn -> prepare("INSERT INTO `caracteristicas`(`id_puesto`, `puesto`) 
    VALUES (null,:puesto);");

    $sentencia -> bindParam(":puesto", $nombrepuesto);
    $sentencia -> execute();
    $mensaje="Puesto Agregado!";
    header("Location:index.php?mensaje=".$mensaje);
}
?>

<?php include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        Crear Puesto
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nombrepuesto" class="form-label">Nombre Puesto</label>
              <input type="text"
                class="form-control" name="nombrepuesto" id="nombrepuesto" 
                aria-describedby="helpId" placeholder="Programador">
            </div>

        
           <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-danger" 
            href="<?php echo $url_base;?>/modules/caracteristicas/index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>


<?php include("../../templates/footer.php"); ?>

