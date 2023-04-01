<?php include("../../database.php");

print_r($_GET);

if ($_POST) {
    print_r($_POST);

    $nombreusuario = (isset($_POST['nombreusuario']) ? $_POST['nombreusuario'] : "");
    $passwordusuario = (isset($_POST['passwordusuario']) ? $_POST['passwordusuario'] : "");
    $emailusuario = (isset($_POST['emailusuario']) ? $_POST['emailusuario'] : "");

    $sentencia = $conn->prepare("INSERT INTO `users`(`id_usuario`,`nombre`, `password`,`correo`) 
    VALUES (null,:nombre,:passwordusuario,:correo);");

    $sentencia->bindParam(":nombre", $nombreusuario);
    $sentencia->bindParam(":passwordusuario", $passwordusuario);
    $sentencia->bindParam(":correo", $emailusuario);

    $sentencia->execute();

    $mensaje="Usuario creado!";
    header("Location:index.php?mensaje=".$mensaje);
}
?>

<?php include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        Ingresar usuario
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombreusuario" class="form-label">Nombre Usuario</label>
                <input type="text" class="form-control" name="nombreusuario" id="nombreusuario"
                    aria-describedby="helpId" placeholder="Carlos">
            </div>
            <div class="mb-3">
                <label for="passwordusuario" class="form-label">Password Usuario</label>
                <input type="password" class="form-control" name="passwordusuario" id="passwordusuario"
                    aria-describedby="helpId" placeholder="*******">
            </div>
            <div class="mb-3">
                <label for="emailusuario" class="form-label">Email Usuario</label>
                <input type="email" pattern="[^ @]*@[^ @]*" class="form-control" name="emailusuario" id="emailusuario"
                    aria-describedby="helpId" placeholder="Carlos@gmail.com">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-danger" href="<?php echo $url_base; ?>/modules/user/index.php"
                role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>

<?php include("../../templates/footer.php"); ?>