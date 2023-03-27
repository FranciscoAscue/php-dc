<?php include("../../database.php");

$sentencia = $conn->prepare("SELECT * FROM `users`");
$sentencia->execute();
$lista_usuario = $sentencia->fetchAll(PDO::FETCH_ASSOC);

if ($_GET) {

    $textID = (isset($_GET['textID']) ? $_GET['textID'] : "");
    $sentencia = $conn->prepare("DELETE FROM `users` WHERE id_usuario = :id;");
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();
    header("Location:index.php");
}

?>

<?php include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="<?php echo $url_base; ?>/modules/user/build.php"
            role="button">Agregar usuario</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre usuario</th>
                        <th scope="col">Password</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_usuario as $usuario) { ?>
                        <tr class="">
                            <td scope="row">
                                <?php echo $usuario["id_usuario"]; ?>
                            </td>
                            <td>
                                <?php echo $usuario["nombre"]; ?>
                            </td>
                            <td>
                                <?php echo $usuario["password"]; ?>
                            </td>
                            <td>
                                <?php echo $usuario["correo"]; ?>
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="/modules/user/edit.php?textID=<?php
                                echo $usuario['id_usuario']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger" href="/modules/user/index.php?textID=<?php
                                echo $usuario['id_usuario']; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php }
                    ; ?>
                </tbody>
            </table>
        </div>
    </div class="card-body">
</div>


<?php include("../../templates/footer.php"); ?>