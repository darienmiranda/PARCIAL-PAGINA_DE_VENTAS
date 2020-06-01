<?php 
    $title = "CREA TU CUENTA";
    include('templates/header.php');
?>

<div class="form-group">
    <p class="h2 text-center">Crea Tu Cuenta Ya</p>
    <div class="text-center h6">
        ¿Ya tienes cuenta?&nbsp;<a href="iniciar_sesion.php?id=<?= $ide?>&sesion=<?= $Sesion?>&pass=<?= $pass?>">inicia sesion aqui</a>
    </div>
</div>
<div class="border border-dark container bg-warning rounded-lg font-weight-bold">
    <form action="guardar_usuario.php?id=<?= $ide?>&sesion=<?= $Sesion?>&pass=<?= $pass?>" method="post">
        <div class="form-row">
            <div class="col">
                <label for="Nombre">Nombre: (*)</label>
                <input type="text" class="form-control border border-dark" id="Nombre" name="nombre" maxlength="50" required>
            </div>
            <div class="col">
                <label for="Apellido">Apellido:</label>
                <input type="text" class="form-control border border-dark" id="Apellido" name="apellido" maxlength="50" >
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Email">E-mail (*)</label>
                <input type="email" class="form-control border border-dark" id="Email" name="email" maxlength="255" required>
            </div>
            <div class="form-group col-md-6">
                <label for="Password">Password (*)</label>
                <input type="password" class="form-control border border-dark" id="Password" name="password" maxlength="12" required>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <label for="Celular">Celular: (*)</label>
                <input type="text" class="form-control border border-dark" id="Celular" name="celular" maxlength="20" onKeyPress="return SoloNumeros(event)" required>
            </div>
            <div class="col">
                <label for="Identificador">Identificador de pais</label>
                <select id="Identificador" class="form-control border border-dark" name="identificador">
                    <option value="+57" selected>+57 (Colombia)</option>
                    <option value="+52">+52 (Mexico)</option>
                    <option value="+55">+55 (Brazil)</option>
                    <option value="+54">+54 (Argentina)</option>
                    <option value="+507">+507 (Panama)</option>
                    <option value="+52">+51 (Peru)</option>
                </select>
            </div>
            <div class="col">
                <label for="Whatsapp">WhatsApp:</label>
                <input type="text" class="form-control border border-dark" id="Whatsapp" name="whatsapp" maxlength="50" onKeyPress="return SoloNumeros(event)">
            </div>
        </div>
        <div class="form-group">
            <label for="Direccion">Direccion</label>
            <input type="text" class="form-control border border-dark" id="Direccion" name="direccion" maxlength="255">
        </div>
        <div class="form-group">
            <label for="Ciudad">Ciudad</label>
            <input type="text" class="form-control border border-dark" id="Ciudad" name="ciudad" maxlength="255">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success btn-block border-dark">Registrarse</button>
        </div>
    </form>
</div>

<script type="text/javascript">

    function SoloNumeros(e) {
        var key = window.Event ? e.which : e.keyCode
	    return (key >= 48 && key <= 57)
    }
</script>