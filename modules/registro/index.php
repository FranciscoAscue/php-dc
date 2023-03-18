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
                <th scope="col">Nombre</th>
                <th scope="col">Foto</th>
                <th scope="col">CV</th>
                <th scope="col">Puesto</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td scope="row">Name1</td>
                <td>imagen.jpg</td>
                <td>cv.pdf</td>
                <td>Puesto</td>
                <td>2022/01/01</td>
                <td><a name="" id="" class="btn btn-primary" 
        href="<?php echo $url_base;?>/modules/registro/build.php" 
        role="button">Carta</a>
        <a name="" id="" class="btn btn-info" 
        href="<?php echo $url_base;?>/modules/registro/build.php" 
        role="button">Editar</a>
        <a name="" id="" class="btn btn-danger" 
        href="<?php echo $url_base;?>/modules/registro/build.php" 
        role="button">Eliminar</a></td>
            </tr>
        </tbody>
    </table>
  </div>
  
    <div class="card-footer text-muted">
        Tabla
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
