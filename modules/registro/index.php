<?php include("../../database.php");

$sentencia = $conn->prepare("SELECT *,
(SELECT puesto FROM `caracteristicas` 
WHERE `caracteristicas`.`id_puesto` = `registro`.`id_puesto` 
LIMIT 1) as puesto
FROM `registro`");

$sentencia->execute();
$lista_resgistro = $sentencia->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['textID'])) {

    $textID = (isset($_GET['textID']))?$_GET['textID'] : "";
    $sentencia = $conn->prepare("SELECT foto,cv FROM `registro` WHERE id=:id;");
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();
    $lista_files_name = $sentencia->fetch(PDO::FETCH_LAZY);
    if(isset($lista_files_name["foto"]) && $lista_files_name["foto"]!=""){
        if(file_exists("./".$lista_files_name["foto"])){
            unlink("./".$lista_files_name["foto"]);
        }
    }

    if(isset($lista_files_name["cv"]) && $lista_files_name["cv"]!=""){
        if(file_exists("./".$lista_files_name["cv"])){
            unlink("./".$lista_files_name["cv"]);
        }
    }

    $sentencia_delete = $conn->prepare("DELETE FROM `registro` WHERE id=:id;");
    $sentencia_delete->bindParam(":id", $textID);
    $sentencia_delete->execute();
    $mensaje="Registro Eliminado!";
    header("Location:index.php?mensaje=".$mensaje);
}
?>

<?php include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="<?php echo $url_base; ?>/modules/registro/build.php"
            role="button">Agregar Registro</a>
    </div>
    <div class="table-responsive-sm">
        <table class="table" id="tabla_id">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Foto</th>
                    <th scope="col">CV</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista_resgistro as $registro) { ?>

                    <tr class="">
                        <td scope="row">
                            <?php echo $registro["id"]; ?>
                        </td>
                        <td>
                            <?php echo $registro["nombre"]; ?>
                        </td>
                        <td> <img width="40" src="/modules/registro/<?php echo $registro["foto"]; ?>" class="img-fluid rounded" alt=""></td>
                        <td>
                            <a target="_blank" href="<?php echo $registro["cv"]; ?>">
                            <?php echo $registro["cv"]; ?></a>
                        </td>
                        <td>
                            <?php echo $registro["puesto"]; ?>
                        </td>
                        <td>
                            <?php echo $registro["fecha"]; ?>
                        </td>
                        <td>
                            <a name="" id="" class="btn btn-primary"
                                href="/modules/registro/carta_recomend.php?textID=<?php echo $registro["id"]; ?>" 
                                role="button">Carta</a>

                            <a name="" id="" class="btn btn-info"
                                href="/modules/registro/edit.php?textID=<?php echo $registro["id"]; ?>"
                                role="button">Editar</a>

                            <a name="" id="" class="btn btn-danger"
                                href="javascript:borrar(<?php echo $registro['id']; ?>)"
                                role="button">Eliminar</a>
                        </td>
                    </tr>

                <?php }
                ; ?>

            </tbody>
        </table>
    </div>

    <div class="card-footer text-muted">
        Tabla
    </div>
</div>

<?php include("../../templates/footer.php"); ?>