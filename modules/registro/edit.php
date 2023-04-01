<?php
include("../../database.php");

$sentencia = $conn->prepare("SELECT * FROM `caracteristicas`");
$sentencia->execute();
$lista_puesto = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// recuperar datos de la base de datos para mostrar en el formulario
if (isset($_GET['textID'])) {
  $textID = (isset($_GET['textID']) ? $_GET['textID'] : "");
  $sentencia = $conn->prepare("SELECT *,(SELECT puesto FROM `caracteristicas` 
  WHERE `caracteristicas`.`id_puesto` = `registro`.`id_puesto` 
  LIMIT 1) as puesto FROM `registro` where id = :id ;");

  $sentencia->bindParam(":id", $textID);
  $sentencia->execute();
  $registro = $sentencia->fetch(PDO::FETCH_LAZY);

  $nombre = $registro["nombre"];
  $foto = $registro["foto"];
  $cv = $registro["cv"];
  $idpuesto = $registro["id_puesto"];
  $puesto = $registro["puesto"];
  $fecha = $registro["fecha"];
}

// Guardar nuesvos datos (UPDATE)

if ($_POST) {

  $textID = (isset($_POST['id']) ? $_POST['id'] : "");
  $nombre_post = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
  $puesto_post = (isset($_POST['puesto']) ? $_POST['puesto'] : "");
  $date_post = (isset($_POST['date']) ? $_POST['date'] : "");
  
  $sentencia = $conn->prepare("UPDATE `registro` SET `nombre` = :nombre,
   `id_puesto` = :id_puesto, `fecha` = :fecha WHERE `registro`.`id` = :id;");

  $sentencia->bindParam(":nombre", $nombre_post);
  $sentencia->bindParam(":id_puesto", $puesto_post);
  $sentencia->bindParam(":fecha", $date_post);
  $sentencia->bindParam(":id", $textID);
  $sentencia->execute();


  $foto_post = (isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : "");
  $fecha_name = new DateTime();
  
  $nombre_archivo_foto = ($foto_post != '') ? $fecha_name->getTimestamp() . "_" . $_FILES['foto']['name'] : "";
  $tmp_foto = $_FILES["foto"]["tmp_name"];
  if ($tmp_foto != "") {
    move_uploaded_file($tmp_foto, "./" . $nombre_archivo_foto);
    
    $sentencia = $conn->prepare("SELECT foto FROM `registro` WHERE id=:id;");
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();
    $foto_file_name = $sentencia->fetch(PDO::FETCH_LAZY);
    if(isset($foto_file_name["foto"]) && $foto_file_name["foto"]!=""){
        if(file_exists("./".$foto_file_name["foto"])){
            unlink("./".$foto_file_name["foto"]);
        }
    }

    $sentencia = $conn->prepare("UPDATE `registro` SET `foto` = :foto 
    WHERE `registro`.`id` = :id;");
    $sentencia->bindParam(":foto", $nombre_archivo_foto);
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();

  }
  
  
  
  $cv_post = (isset($_FILES['cv']['name']) ? $_FILES['cv']['name'] : "");
  
  $nombre_archivo_cv = ($cv_post != '') ? $fecha_name->getTimestamp() . "_" . $_FILES['cv']['name'] : "";
  $tmp_cv = $_FILES["cv"]["tmp_name"];
  if ($tmp_cv != "") {
    move_uploaded_file($tmp_cv, "./" . $nombre_archivo_cv);
    
    $sentencia = $conn->prepare("SELECT cv FROM `registro` WHERE id=:id;");
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();
    $cv_file_name = $sentencia->fetch(PDO::FETCH_LAZY);
    if(isset($cv_file_name["cv"]) && $cv_file_name["cv"]!=""){
        if(file_exists("./".$cv_file_name["cv"])){
            unlink("./".$cv_file_name["cv"]);
        }
    }

    $sentencia = $conn->prepare("UPDATE `registro` SET `cv` = :cv 
    WHERE `registro`.`id` = :id;");
    $sentencia->bindParam(":cv", $nombre_archivo_cv);
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();
  }

  $mensaje="Registro actualizado!";
  header("Location:index.php?mensaje=".$mensaje);
}

?>

<?php include("../../templates/header.php"); ?>

<div class="card">
  <div class="card-header">
    Editar Datos del Empleado
  </div>
  <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" value="<?php echo $textID; ?>" class="form-control" readonly name="id" id="id"
          aria-describedby="helpId" placeholder="">
      </div>
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="nombre" id="nombre"
          aria-describedby="helpId" placeholder="">
      </div>
      <div class="mb-3">
        <label for="foto" class="form-label">Foto : </label>
        <img width="40" src="<?php echo $foto; ?>" alt="">
        <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="">
      </div>
      <div class="mb-3">
        <label for="cv" class="form-label">CV (PDF): </label>
        <a target="_blank" href="<?php echo $cv; ?>"><?php echo $cv; ?></a>
        <input type="file" class="form-control" name="cv" id="cv" aria-describedby="helpId" placeholder="">
      </div>
      <div class="mb-3">
        <label for="puesto" class="form-label">Puesto</label>
        <select class="form-select form-select-sm" name="puesto" id="puesto">
          <?php foreach ($lista_puesto as $puestos) { ?>
            <option <?php echo ($idpuesto == $puestos["id_puesto"]) ? "selected" : ""; ?>
              value="<?php echo $puestos["id_puesto"]; ?>">
              <?php echo $puestos["puesto"]; ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="date" class="form-label">Fecha</label>
        <input type="date" class="form-control" value="<?php echo $fecha; ?>" name="date" id="date" aria-describedby=""
          placeholder="">
      </div>

      <button type="submit" class="btn btn-success">Agregar</button>
      <a name="" id="" class="btn btn-danger" href="<?php echo $url_base; ?>/modules/registro/index.php"
        role="button">Cancelar</a>
    </form>
  </div>
  <div class="card-footer text-muted">
    Footer
  </div>
</div>
<?php include("../../templates/footer.php"); ?>