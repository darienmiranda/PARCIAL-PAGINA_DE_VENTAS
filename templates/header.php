<?php 
    include('includes/verify_install.php');
    include('includes/db.php');

    if(!isset($_GET['id']))
    {
        $_GET['id'] = "NULL";
    }
    if(!isset($_GET['sesion']))
    {
        $_GET['sesion'] = "false";
    }
    if(!isset($_GET['pass']))
    {
        $_GET['pass'] = "";
    }
    
    $ide = $_GET['id'];
    $Sesion = $_GET['sesion'];
    $pass = $_GET['pass'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> · Ventas Online</title>
    <link rel="icon" type="image/jpg" href="logo.jpg">
    <!-- Aqui van nuestros estilos -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
        #alerta_sesion_false{
            display: none;
        }
    </style>
    <script type="text/javascript">

        function SoloNumeros(e) {
            var key = window.Event ? e.which : e.keyCode
            return (key >= 48 && key <= 57)
        }

        function volver(){
            window.history.go(-1);
        }
    </script>
    <div class="bg-dark">
    <div class="container bg-white">
        <div class="p-3 mb-2 bg-warning border-bottom border-dark rounded-bottom ">
            <div class="d-flex justify-content-around">
                <div class="text-center font-weight-bold text-white">
                    <a href="manual_de_usuario.html" TARGET="_BLANK">Manual de usuario</a>
                </div>
                <div class="text-center font-weight-bold text-white">
                    <a href="manual_del_programador.html" TARGET="_BLANK">Manual del programador</a>
                </div>
            </div>
            <br>
            <div class="d-flex justify-content-around">
                <div class="text-center font-weight-bold text-white">
                    <a href="perfil.php?id=<?= $ide?>&sesion=<?= $Sesion?>&pass=<?= $pass?>" class="text-center text-decoration-none h3"><img src="user.jpg" class="align-self-center mr-3 rounded-circle" width="50" height="50"></a>
                </div>
                <p class="h1 text-center font-weight-bold text-white">Ventas Online</p>
                <img src="logo.jpg" class="ml-3" width="50" height="50">
            </div>
            
            <div class="d-flex justify-content-around">
                <a href="index.php?id=<?= $ide?>&sesion=<?= $Sesion?>&pass=<?= $pass?>" class="text-center text-decoration-none h3">
                    Inicio
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M16 9l-3-3V2h-2v2L8 1 0 9h2l1 5c0 .55.45 1 1 1h8c.55 0 1-.45 1-1l1-5h2zm-4 5H9v-4H7v4H4L2.81 7.69 8 2.5l5.19 5.19L12 14z"></path></svg>
                </a>
                <a href="vender.php?id=<?= $ide?>&sesion=<?= $Sesion?>&pass=<?= $pass?>" class="text-center text-decoration-none h3">vender</a>
                <?php if($Sesion == "false"){ ?>
                    <a href="registrar_usuarios.php?id=<?= $ide?>&sesion=<?= $Sesion?>&pass=<?= $pass?>" class="text-center text-decoration-none h3">
                        Crea tu cuenta
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 16" width="12" height="16"><path fill-rule="evenodd" d="M12 14.002a.998.998 0 01-.998.998H1.001A1 1 0 010 13.999V13c0-2.633 4-4 4-4s.229-.409 0-1c-.841-.62-.944-1.59-1-4 .173-2.413 1.867-3 3-3s2.827.586 3 3c-.056 2.41-.159 3.38-1 4-.229.59 0 1 0 1s4 1.367 4 4v1.002z"></path></svg>
                    </a>
                <?php }else{ ?>
                    <a href="perfil.php?id=<?= $ide?>&sesion=<?= $Sesion?>&pass=<?= $pass?>" class="text-center text-decoration-none h3">
                        Perfil
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 16" width="12" height="16"><path fill-rule="evenodd" d="M12 14.002a.998.998 0 01-.998.998H1.001A1 1 0 010 13.999V13c0-2.633 4-4 4-4s.229-.409 0-1c-.841-.62-.944-1.59-1-4 .173-2.413 1.867-3 3-3s2.827.586 3 3c-.056 2.41-.159 3.38-1 4-.229.59 0 1 0 1s4 1.367 4 4v1.002z"></path></svg>
                    </a>
                <?php    } ?>
            </div>
        </div>