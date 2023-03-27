<?php include("../../database.php");


$sentencia = $conn->prepare("SELECT * FROM `caracteristicas`");
$sentencia->execute();
$lista_puesto = $sentencia -> fetchAll(PDO::FETCH_ASSOC);

if($_POST){
    print_r($_POST);
    print_r($_FILES);

    $nombre = (isset($_POST['nombre'])?$_POST['nombre']:"");

    $foto = (isset($_FILES['foto']['name'])?$_FILES['foto']['name']:"");
    $cv = (isset($_FILES['cv']['name'])?$_FILES['cv']['name']:"");

    $puesto = (isset($_POST['puesto'])?$_POST['puesto']:"");
    $date = (isset($_POST['date'])?$_POST['date']:"");

    $sentencia = $conn -> prepare("INSERT INTO 
    `registro`(`id`,`nombre`,`foto`,`cv`,`id_puesto`,`fecha`) 
    VALUES (null,:nombre,:foto,:cv,:puesto,:fecha );");

    $sentencia -> bindParam(":nombre", $nombre);
    $sentencia -> bindParam(":foto", $foto);
    $sentencia -> bindParam(":cv", $cv);
    $sentencia -> bindParam(":puesto", $puesto);  
    $sentencia -> bindParam(":fecha", $date);

    $sentencia -> execute();

    header("Location:index.php");

}
?>


<?php include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        Datos del Empleado
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text"
                class="form-control" name="nombre" id="nombre" 
                aria-describedby="helpId" placeholder="Juan">
            </div>
            <div class="mb-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file"
                class="form-control" name="foto" id="foto" 
                aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
              <label for="cv" class="form-label">CV (PDF)</label>
              <input type="file"
                class="form-control" name="cv" id="cv" 
                aria-describedby="helpId" placeholder="">
            </div>

           <div class="mb-3">
            <label for="puesto" class="form-label">Puesto</label>
            <select class="form-select form-select-sm" name="puesto" id="puesto">
              <option value="NULL" selected>Seleccionar Uno</option>
              <?php foreach($lista_puesto as $puestos){ ?>
                <option value="<?php echo $puestos["id_puesto"];?>">
                <?php echo $puestos["puesto"];?>
                </option>
                <?php } ?>
            </select>
           </div>

           <div class="mb-3">
             <label for="date" class="form-label">Fecha</label>
             <input type="date" class="form-control" name="date" id="date" aria-describedby="emailHelpId" placeholder="abc@mail.com">
           </div>

           <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-danger" 
            href="<?php echo $url_base;?>/modules/registro/index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>
<?php include("../../templates/footer.php"); ?>
