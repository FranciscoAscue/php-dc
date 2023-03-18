<?php include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        Datps del Empleado
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
              <label for="apellido" class="form-label">Apellidos</label>
              <input type="text"
                class="form-control" name="apellido" id="apellido" 
                aria-describedby="helpId" placeholder="Perez">
            </div>

            <div class="mb-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file"
                class="form-control" name="foto" id="foto" 
                aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
              <label for="cv" class="form-label">Archivo de CV</label>
              <input type="text"
                class="form-control" name="cv" id="cv" 
                aria-describedby="helpId" placeholder="Juan">
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
                <option selected>Select one</option>
                <option value="">New Delhi</option>
                <option value="">Istanbul</option>
                <option value="">Jakarta</option>
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
