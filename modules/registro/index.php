<?php  include("../../database.php");

$sentencia = $conn -> prepare("SELECT *,
(SELECT puesto FROM `caracteristicas` 
WHERE `caracteristicas`.`id_puesto` = `registro`.`id_puesto` 
LIMIT 1) as puesto
FROM `registro`");

$sentencia -> execute();
$lista_resgistro = $sentencia -> fetchAll(PDO::FETCH_ASSOC);

if($_GET){

    $textID = (isset($_GET['textID'])?$_GET['textID']:"");
    $sentencia = $conn -> prepare("DELETE FROM `registro` WHERE id = :id;");
    $sentencia -> bindParam(":id", $textID);
    $sentencia -> execute();
    header("Location:index.php");
}


?>

<?php include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" 
        href="<?php echo $url_base;?>/modules/registro/build.php" 
        role="button">Agregar Registro</a>
    </div>
  <div class="table-responsive-sm">
    <table class="table">
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
        <?php foreach($lista_resgistro as $registro) { ?>

            <tr class="">
                <td scope="row"><?php echo $registro["id"];?></td>
                <td><?php echo $registro["nombre"];?></td>
                <td><?php echo $registro["foto"];?></td>
                <td><?php echo $registro["cv"];?></td>
                <td><?php echo $registro["puesto"];?></td>
                <td><?php echo $registro["fecha"];?></td>
                <td><a name="" id="" class="btn btn-primary" 
        href="<?php echo $url_base;?>/modules/registro/build.php" 
        role="button">Carta</a>
        <a name="" id="" class="btn btn-info" 
        href="<?php echo $url_base;?>/modules/registro/build.php" 
        role="button">Editar</a>
        <a name="" id="" class="btn btn-danger" 
        href="<?php echo $url_base;?>/modules/registro/index.php?texID=<?php echo $registro["id"]; ?>" 
        role="button">Eliminar</a></td>
            </tr>

            <?php } ;?>

        </tbody>
    </table>
  </div>
  
    <div class="card-footer text-muted">
        Tabla
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
