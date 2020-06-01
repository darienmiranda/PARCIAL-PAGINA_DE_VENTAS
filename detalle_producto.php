<?php
    $id_persona = $_GET['id'];
    $Sesion = $_GET['sesion'];
    $id_producto = $_GET['producto'];
    $title = "Detalle Del Producto";
    include('templates/header.php');

    if($Sesion == "true")
    {

        if(!isset($_GET['id']) || $id_persona == "NULL" || $id_persona == "")
        {
            header('Location: iniciar_sesion.php?id=NULL&sesion=false&pass=');
        }
        $ssql = "SELECT * FROM usuarios WHERE id = '$ide'";
        $result = DB::query($ssql);
        $mostrar = mysqli_fetch_array($result);

        //comprobar inicio de sesion
        if($pass != $mostrar['password'])
        {
            header('Location: iniciar_sesion.php?id=NULL&sesion=false&pass=');
        }
    }

    $sql = "SELECT A.id AS id_producto, A.persona_id AS id_persona, A.nombre AS nom_producto, A.descripcion AS des_producto, A.precio AS precio_producto, A.img_producto AS img_producto, A.estado AS estado_producto, B.id AS id_usuario, B.nombre AS nom_usuario, B.apellido AS ape_usuario, B.celular AS cel_usuario, B.whatsapp AS what_usuario FROM productos A, usuarios B WHERE(A.persona_id = B.id) AND (A.id = '$id_producto')";
    $result = DB::query($sql);
    $mostrar = mysqli_fetch_array($result);
?>
<div class="border border-dark container bg-warning rounded-lg">
    <br>
    <?php if($Sesion == "true" &&  $mostrar['id_usuario'] == $id_persona){ ?>
        <div class="container">
            <a href="perfil.php?id=<?= $ide?>&sesion=<?= $Sesion?>&pass=<?= $pass?>" class="text-center btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M8.5 4.5L7 3 2 8l5 5 1.5-1.5L5.821 9H14V7H5.821L8.5 4.5z"></path></svg>
                Volver
            </a>
        </div> 
    <?php }else{ ?>
        <a href="index.php?id=<?= $ide?>&sesion=<?= $Sesion?>&pass=<?= $pass?>" class="text-center btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M8.5 4.5L7 3 2 8l5 5 1.5-1.5L5.821 9H14V7H5.821L8.5 4.5z"></path></svg>
                Volver
            </a>
    <?php } ?>
    <br>
    <div class="border border-dark container bg-white rounded-lg">
        <?php if($Sesion!="false"  && $mostrar['id_usuario'] == $id_persona){ ?>
            <div class="p-3 mb-2 bg-transparent border-bottom border-dark rounded-bottom">
                <div class="d-flex justify-content-around">
                    <?php if($mostrar['estado_producto'] == "activo") {?>
                        <a href="registrar_venta.php?id=<?= $id_persona ?>&sesion=<?= $Sesion?>&producto=<?= $id_producto?>&accion=inactivar&pass=<?= $pass?>" class="text-center border border-dark btn btn-danger h3">
                            Inactivar
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 16" width="12" height="16"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg>
                        </a>
                    <?php }else{ ?>
                        <a href="registrar_venta.php?id=<?= $id_persona ?>&sesion=<?= $Sesion?>&producto=<?= $id_producto?>&accion=activar&pass=<?= $pass?>" class="text-center border border-dark btn btn-success h3">
                            activar
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 16" width="12" height="16"><path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5L12 5z"></path></svg>
                        </a>
                    <?php } ?>
                    <a href="editar_producto.php?id=<?= $id_persona ?>&sesion=<?= $Sesion?>&producto=<?= $id_producto?>&pass=<?= $pass?>" class="text-center border border-dark btn btn-warning h3">
                        Editar
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 16" width="14" height="16"><path fill-rule="evenodd" d="M0 12v3h3l8-8-3-3-8 8zm3 2H1v-2h1v1h1v1zm10.3-9.3L12 6 9 3l1.3-1.3a.996.996 0 011.41 0l1.59 1.59c.39.39.39 1.02 0 1.41z"></path></svg>
                    </a>
                    <a href="registrar_venta.php?id=<?= $id_persona ?>&sesion=<?= $Sesion?>&producto=<?= $id_producto?>&accion=eliminar&pass=<?= $pass?>" class="text-center border border-dark btn btn-danger h3">
                        Eliminar
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 16" width="12" height="16"><path fill-rule="evenodd" d="M11 2H9c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1H2c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1v9c0 .55.45 1 1 1h7c.55 0 1-.45 1-1V5c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 12H3V5h1v8h1V5h1v8h1V5h1v8h1V5h1v9zm1-10H2V3h9v1z"></path></svg>
                    </a>
                </div>
            </div>
        <?php } ?>
        <br>
        <div class="row no-gutters">
                <div class="col-md-4">
                    <img src=<?= $mostrar['img_producto']?> class="card-img" >
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="text-right">
                            <p class="card-text text-info font-weight-bold">Estado: <?= $mostrar['estado_producto']?></p>
                        </div>
                        <h5 class="card-title font-weight-bold"><?= $mostrar['nom_producto']?></h5>
                        <p class="card-text text-info font-weight-bold">Precio: $<?= $mostrar['precio_producto']?></p>
                        <p class="card-text text-justify"><?= $mostrar['des_producto']?></p>
                        <br>
                        <?php if($Sesion!="true" || $Sesion == "true" && $mostrar['id_usuario'] != $id_persona) {?>
                            <div class="font-weight-bold">
                                <p class="card-text text-justify">
                                    Para mas informacion porfavor counicarse con el vendedor:
                                </p>
                                <p class="card-text text-justify">Vendedor: <?= $mostrar['nom_usuario']?> <?= $mostrar['ape_usuario']?></p>
                                <p class="card-text text-justify">Celular: <?= $mostrar['cel_usuario']?></p>
                                <p class="card-text text-justify">WhatsApp: <?= $mostrar['what_usuario']?></p>
                            </div>
                            <div class="card-body text-right">
                                <?php if($Sesion == "true" && $mostrar['id_usuario'] != $id_persona) {?>
                                    <a href="carrito.php?id=<?= $ide?>&sesion=<?= $Sesion?>&producto=<?= $mostrar['id_producto']?>&pass=<?= $pass?>&accion=compra" class="btn btn-lg btn-info border-dark text-center btn-sm" >
                                        Añadir a mi carrito
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 16" width="10" height="16"><path fill-rule="evenodd" d="M9 0H1C.27 0 0 .27 0 1v15l5-3.09L10 16V1c0-.73-.27-1-1-1zm-.78 4.25L6.36 5.61l.72 2.16c.06.22-.02.28-.2.17L5 6.6 3.12 7.94c-.19.11-.25.05-.2-.17l.72-2.16-1.86-1.36c-.17-.16-.14-.23.09-.23l2.3-.03.7-2.16h.25l.7 2.16 2.3.03c.23 0 .27.08.09.23h.01z"></path></svg>
                                    </a>
                                <?php }else{?>
                                    <button class="btn btn-lg btn-info border-dark text-center btn-sm disabled" onmouseover="mostrar_alerta_de_carrito();">
                                        Añadir a mi carrito
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 16" width="10" height="16"><path fill-rule="evenodd" d="M9 0H1C.27 0 0 .27 0 1v15l5-3.09L10 16V1c0-.73-.27-1-1-1zm-.78 4.25L6.36 5.61l.72 2.16c.06.22-.02.28-.2.17L5 6.6 3.12 7.94c-.19.11-.25.05-.2-.17l.72-2.16-1.86-1.36c-.17-.16-.14-.23.09-.23l2.3-.03.7-2.16h.25l.7 2.16 2.3.03c.23 0 .27.08.09.23h.01z"></path></svg>
                                    </button>
                                <?php }?>
                            </div>
                            <div id="alerta_sesion_false">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                                    Para añadir a tu carrito <a href="iniciar_sesion.php" class="alert-link">Inicia sesion</a> o <a href="registrar_usuarios.php" class="alert-link">Registrate</a>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="ocultar_alerta_de_carrito();">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        <br>
    </div>
    <br>
</div>

<script type="text/javascript">
    function mostrar_alerta_de_carrito(){
        document.getElementById('alerta_sesion_false').style.display = 'block';
    }

    function ocultar_alerta_de_carrito(){
        document.getElementById('alerta_sesion_false').style.display = 'none';
    }
</script>

