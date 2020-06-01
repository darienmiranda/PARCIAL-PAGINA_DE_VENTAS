<?php 
    $title = "INICIA SESION";
    include('templates/header.php');
?>

<div class="form-group">
    <p class="h2 text-center">Iniciar Sesion</p>
    <div class="text-center h6">
        ¿No tienes cuenta?&nbsp;<a href="registrar_usuarios.php?id=<?= $ide?>&sesion=<?= $Sesion?>&pass=<?= $Sesion?>">registrate aqui</a>
    </div>
</div>
<div class="border border-dark container bg-warning rounded-lg font-weight-bold">
    <form  action="sesion.php" method="post">
        <div class="form-group">
            <div class="col">
                <label for="Email">E-mail:</label>
                <input type="email" class="form-control border border-dark" id="Email" name="email" maxlength="255">
            </div>
        </div>    
        <div class="form-group">
            <div class="col">
                <label for="Password">Password:</label>
                <input type="password" class="form-control border border-dark" id="Password" name="password" maxlength="12">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success btn-block border-dark">Inicar Sesion</button>
        </div>
    <form>
    <br>
</div>
