<?php 
    $title = "Inicio";
    include('templates/header.php');
?>
<br>
<div class="border border-dark container bg-warning rounded-lg">
    <br>
    <div class="d-flex justify-content-around h4">
        <form action="index.php?id=<?= $ide?>&sesion=<?= $Sesion?>&pass=<?= $pass?>" method="post">
            Buscar Producto: 
            <input type="text" class="border-dark rounded-left" size="50" name="buscar" placeholder="buscar producto">
            <button type="submit" class="border-dark rounded-right">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M15.7 13.3l-3.81-3.83A5.93 5.93 0 0013 6c0-3.31-2.69-6-6-6S1 2.69 1 6s2.69 6 6 6c1.3 0 2.48-.41 3.47-1.11l3.83 3.81c.19.2.45.3.7.3.25 0 .52-.09.7-.3a.996.996 0 000-1.41v.01zM7 10.7c-2.59 0-4.7-2.11-4.7-4.7 0-2.59 2.11-4.7 4.7-4.7 2.59 0 4.7 2.11 4.7 4.7 0 2.59-2.11 4.7-4.7 4.7z"></path></svg>
            </button>
        </form>
    </div>
    <br>
    <div class="border border-dark container bg-white rounded-lg">
        <br>
        <?php 
            include('includes/buscar.php');

            while($imprimir = mysqli_fetch_array($resultado)){
        ?>
            <div class="card mb-3">
                <br>
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= $imprimir['img_producto']?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold"><?= $imprimir['nombre']?></h5>
                            <p class="card-text text-info font-weight-bold">Precio: $<?= $imprimir['precio']?></p>
                            <p class="card-text text-justify"><?= $imprimir['descripcion']?></p>
                            <div class="card-body text-right">
                                <a href="detalle_producto.php?id=<?= $ide?>&sesion=<?= $Sesion?>&producto=<?= $imprimir['id']?>&pass=<?= $pass?>" class="text-right">Detalles</a>
                            </div>
                            <div class="card-footer text-muted">
                                Publicado: <?= $imprimir['fecha']?>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <br>
            </div>
        <?php } ?>
    </div>
    <br>
</div>