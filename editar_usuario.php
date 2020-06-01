<?php 

    
    $title = "Editar perfil";
    include('templates/header.php');

    if(isset($_GET['id']) == false || $_GET['id'] == "NULL"){
        echo  "<script>
            alert('Es necesario enviar una id');
            window.history.go(-1);
            </script>";
        die;
    }
    $ide = $_GET['id'];
    $ssql = "SELECT * FROM usuarios WHERE id = '$ide'";
    $result = DB::query($ssql);
    $mostrar = mysqli_fetch_array($result);

    //comprobar inicio de sesion
    if($pass != $mostrar['password'])
    {
        header('Location: iniciar_sesion.php?id=NULL&sesion=false&pass=');
    }



    $sql = "select * from usuarios where id= $ide";
    $persona = DB::query($sql);
    $persona = mysqli_fetch_object($persona);
    if($persona == false){
        echo  "<script>
            alert('El usuario no existe');
            window.history.go(-1);
            </script>";
        die;
    }
    
?>

<div class="form-group">
    <p class="h2 text-center">
        Editar Perfil&nbsp;
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 16" width="18" height="20"><path fill-rule="evenodd" d="M0 12v3h3l8-8-3-3-8 8zm3 2H1v-2h1v1h1v1zm10.3-9.3L12 6 9 3l1.3-1.3a.996.996 0 011.41 0l1.59 1.59c.39.39.39 1.02 0 1.41z"></path></svg>
    </p>
</div>
<div class="border border-dark container bg-warning rounded-lg">
    <form action="guardar_usuario.php?id=<?= $ide?>&sesion=<?= $Sesion?>&pass=<?= $pass?>" method="post">
        <div class="form-row">
            <div class="col">
                <label for="Nombre">Nombre: (*)</label>
                <input type="text" class="form-control border border-dark" id="Nombre" name="nombre" maxlength="50" value="<?= $persona->nombre ?>" required>
            </div>
            <div class="col">
                <label for="Apellido">Apellido:</label>
                <input type="text" class="form-control border border-dark" id="Apellido" name="apellido" maxlength="50" value="<?= $persona->apellido ?>">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Email">E-mail (*)</label>
                <input type="email" class="form-control border border-dark" id="Email" name="email" maxlength="255" value="<?= $persona->email ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="Password">Password</label>
                <input type="password" class="form-control border border-dark" id="Password" name="password" maxlength="12">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <label for="Celular">Celular: (*)</label>
                <input type="text" class="form-control border border-dark" id="Celular" name="celular" maxlength="20" onKeyPress="return SoloNumeros(event)" value="<?= $persona->celular ?>" required>
            </div>
            <div class="col">
                <label for="Identificador">Identificador de pais</label>
                <select id="Identificador" class="form-control border border-dark" name="identificador">
                    <option value="+57" selected>+57 (Colombia)</option>
                    <option value="+52">+52 (Mexico)</option>
                    <option value="+55">+55 (Brazil)</option>
                    <option value="+54">+54 (Argentina)</option>
                    <option value="+507">+507 (Panama)</option>
                    <option value="+51">+51 (Peru)</option>
                </select>
            </div>
            <div class="col">
                <label for="Whatsapp">WhatsApp: </label>
                <input type="text" class="form-control border border-dark" id="Whatsapp" name="whatsapp" maxlength="50" onKeyPress="return SoloNumeros(event)">
            </div>
        </div>
        <div class="form-group">
            <label for="Direccion">Direccion</label>
            <input type="text" class="form-control border border-dark" id="Direccion" name="direccion" maxlength="255" value="<?= $persona->direccion ?>">
        </div>
        <div class="form-group">
            <label for="Ciudad">Ciudad</label>
            <input type="text" class="form-control border border-dark" id="Ciudad" name="ciudad" maxlength="255" value="<?= $persona->ciudad ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success btn-block border-dark">
                Guargar cambios
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M16 8.5l-6 6-3-3L8.5 10l1.5 1.5L14.5 7 16 8.5zM5.7 12.2l.8.8H2c-.55 0-1-.45-1-1V3c0-.55.45-1 1-1h7c.55 0 1 .45 1 1v6.5l-.8-.8c-.39-.39-1.03-.39-1.42 0L5.7 10.8a.996.996 0 000 1.41v-.01zM4 4h5V3H4v1zm0 2h5V5H4v1zm0 2h3V7H4v1zM3 9H2v1h1V9zm0-2H2v1h1V7zm0-2H2v1h1V5zm0-2H2v1h1V3z"></path></svg>
            </button>
        </div>
    </form>
    <button type="submit" class="btn btn-lg btn-danger btn-block border-dark" onclick="volver()">Cancelar</button>
</div>