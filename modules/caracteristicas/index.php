<?php include("../../database.php");
error_reporting(0);

$sentencia = $conn->prepare("SELECT * FROM `caracteristicas`");
$sentencia->execute();
$lista_caracteristicas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

if ($_GET['textID']) {

    $textID = (isset($_GET['textID']) ? $_GET['textID'] : "");
    $sentencia = $conn->prepare("DELETE FROM `caracteristicas` WHERE id_puesto = :id;");
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();
    $mensaje="Puesto Eliminado!";
    header("Location:index.php?mensaje=".$mensaje);
}


?>

<?php include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="<?php echo $url_base; ?>/modules/caracteristicas/build.php"
            role="button">Agregar Puesto</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table" id="tabla_id">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre Puesto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($lista_caracteristicas as $puestos) { ?>
                        <tr class="">
                            <td scope="row">
                                <?php echo $puestos["id_puesto"]; ?>
                            </td>
                            <td>
                                <?php echo $puestos["puesto"]; ?>
                            </td>
                            <td><a name="" id="" class="btn btn-success" href="/modules/caracteristicas/edit.php?textID=<?php
                            echo $puestos['id_puesto']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger"
                                    href="javascript:borrar(<?php echo $puestos['id_puesto']; ?>)"
                                    role="button">Eliminar</a>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div class="card-body">
</div>

<?php include("../../templates/footer.php"); ?>