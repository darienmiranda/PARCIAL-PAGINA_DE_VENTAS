<?php 
    $title = "Mis compras";
    include('templates/header.php');
    $ssql = "SELECT * FROM usuarios WHERE id = '$ide'";
    $result = DB::query($ssql);
    $mostrar = mysqli_fetch_array($result);

    //comprobar inicio de sesion
    if($pass != $mostrar['password'])
    {
        header('Location: iniciar_sesion.php?id=NULL&sesion=false&pass=');
    }
?>
<div class="border border-dark container bg-warning rounded-lg">
    <br>
    <?php if($Sesion == "true" && $mostrar['id'] == $ide){ ?>
        <div class="container">
            <a href="perfil.php?id=<?= $ide?>&sesion=<?= $Sesion?>&pass=<?= $pass?>" class="text-center btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M8.5 4.5L7 3 2 8l5 5 1.5-1.5L5.821 9H14V7H5.821L8.5 4.5z"></path></svg>
                Volver
            </a>
        </div> 
    <?php } ?>
    <br>
    <div class="border border-dark container bg-white rounded-lg">
        <br>
        <?php
            $sql = "SELECT * FROM compras";
            $result = DB::query($sql);
            $cant_compras = mysqli_num_rows($result);

            $compra = "SELECT * FROM compras WHERE persona_id = ".$ide;
            $result = DB::query($compra);
            $cant_compras_del_usuario = mysqli_num_rows($result);

            if($cant_compras_del_usuario > 0)
            {
                for($i=$cant_compras; $i>=1; $i--)
                {
                    $sql = "SELECT * FROM compras WHERE id='$i'";
                    $result = DB::query($sql);
                    $mostrar = mysqli_fetch_array($result);
                    if($mostrar['persona_id'] == $ide)
                    {
                        $sql = "SELECT A.id AS id_compra,
                            B.nombre AS nom_usuario, B.apellido AS ape_usuario, B.celular AS cel_usuario, B.whatsapp AS what_usuario,
                            C.id AS id_producto, C.nombre AS nom_producto, C.descripcion AS des_producto, C.precio AS precio_producto, C.img_producto, C.estado AS estado_producto, C.fecha
                            FROM compras A, usuarios B, productos C 
                            WHERE (B.id = A.persona_id AND C.id = A.producto_id) AND (A.persona_id = '$ide' AND A.id = '$i')";
                        $result = DB::query($sql);
                        $mostrar = mysqli_fetch_array($result);
        ?>
            <div class="card mb-3 border border-dark container bg-white rounded-lg" >
                <br>
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src=<?= $mostrar['img_producto']?> class="card-img" >
                    </div>
                    <div class="col-md-8">
                        <div class="text-right">
                            <p class="card-text text-info font-weight-bold">Estado: <?= $mostrar['estado_producto']?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold"><?= $mostrar['nom_producto']?></h5>
                            <p class="card-text text-info font-weight-bold">Precio: $<?= $mostrar['precio_producto']?></p>
                            <br>
                            <p class="card-text text-justify"><?= $mostrar['des_producto']?></p>
                        </div>
                        <div class="font-weight-bold container">
                                <p class="card-text text-justify">
                                    Para mas informacion porfavor counicarse con el vendedor:
                                </p>
                                <p class="card-text text-justify">Vendedor: <?= $mostrar['nom_usuario']?> <?= $mostrar['ape_usuario']?></p>
                                <p class="card-text text-justify">Celular: <?= $mostrar['cel_usuario']?></p>
                                <p class="card-text text-justify">WhatsApp: <?= $mostrar['what_usuario']?></p>
                        </div>
                        <div  class="card-body text-right">
                            <a href="carrito.php?id=<?= $ide?>&sesion=<?= $Sesion?>&producto=<?= $mostrar['id_producto']?>&pass=<?= $pass?>&accion=eliminar&ic=<?= $mostrar['id_compra']?>" class="btn btn-lg btn-danger border-dark text-center btn-sm" >
                                Eliminar mi carrito
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 16" width="12" height="16"><path fill-rule="evenodd" d="M11 2H9c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1H2c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1v9c0 .55.45 1 1 1h7c.55 0 1-.45 1-1V5c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 12H3V5h1v8h1V5h1v8h1V5h1v8h1V5h1v9zm1-10H2V3h9v1z"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        <?php } } }else{ ?>
            <br>
            <div class="card mb-3 border border-dark container bg-white rounded-lg" >
                <br>
                <div class="text-center">
                    <p class="h3">Usted no ha añadido ninguna compra</p>
                </div>
                <br>
            </div>
        <?php    } ?>
    </div>
    <br>
</div>