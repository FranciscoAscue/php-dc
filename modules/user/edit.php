<?php include("../../database.php");

if (isset($_GET['textID'])) {
    $textID = (isset($_GET['textID']) ? $_GET['textID'] : "");
    $sentencia = $conn->prepare("SELECT * FROM `users` where id_usuario = :id ;");
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();
    $usuario = $sentencia->fetch(PDO::FETCH_LAZY);
    $name = $usuario["nombre"];
    $pass = $usuario["password"];
    $correo = $usuario["correo"];
}

if ($_POST) {
    $id = (isset($_POST['id']) ? $_POST['id'] : "");
    $nombreusuario = (isset($_POST['nombreusuario']) ? $_POST['nombreusuario'] : "");
    $passwordusuario = (isset($_POST['passwordusuario']) ? $_POST['passwordusuario'] : "");
    $emailusuario = (isset($_POST['emailusuario']) ? $_POST['emailusuario'] : "");

    $sentencia = $conn->prepare("UPDATE `users` 
    SET `nombre` = :nombre, `password` = :pass, `correo` = :correo
    WHERE `users`.`id_usuario` = :id;");
    $sentencia->bindParam(":nombre", $nombreusuario);
    $sentencia->bindParam(":pass", $passwordusuario);
    $sentencia->bindParam(":correo", $emailusuario);
    $sentencia->bindParam(":id", $id);
    $sentencia->execute();
    header("Location:index.php");
}

?>



<?php include("../../templates/header.php"); ?>


<div class="card">
    <div class="card-header">
        Editar Datos del usuario
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" value = "<?php echo $textID;?>" 
                class="form-control" readonly name="id" id="id"
                    aria-describedby="helpId" placeholder=" ">
            </div>
            <div class="mb-3">
              <label for="nombreusuario" class="form-label">Nombre Usuario</label>
              <input type="text" value="<?php echo $name;?>"
                class="form-control" name="nombreusuario" id="nombreusuario" 
                aria-describedby="helpId" placeholder="Carlos">
            </div>
            <div class="mb-3">
              <label for="passwordusuario" class="form-label">Password Usuario</label>
              <input type="password" value="<?php echo $pass;?>"
                class="form-control" name="passwordusuario" id="passwordusuario" 
                aria-describedby="helpId" placeholder="*******">
            </div>
            <div class="mb-3">
              <label for="emailusuario" class="form-label">Email Usuario</label>
              <input type="email" value="<?php echo $correo; ?>" pattern="[^ @]*@[^ @]*"
                class="form-control" name="emailusuario" id="emailusuario" 
                aria-describedby="helpId" placeholder="Carlos@gmail.com">
            </div>
        
           <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-danger" 
            href="<?php echo $url_base;?>/modules/user/index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
