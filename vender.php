<?php 
    $ide = $_GET['id'];
    $Sesion = $_GET['sesion'];
    $pass = $_GET['pass'];
    if($Sesion == "false" && $ide == "NULL" || $Sesion == "false" && $ide != "NULL" || $Sesion == "true" && $ide == "NULL"){
        header('Location: iniciar_sesion.php?id='.$ide.'&sesion='.$Sesion.'&pass='.$password);
    }else{
        $title = "Registrar venta";
        include('templates/header.php');

        $ssql = "SELECT * FROM usuarios WHERE id = '$ide'";
        $result = DB::query($ssql);
        $mostrar = mysqli_fetch_array($result);

        //comprobar inicio de sesion
        if($pass != $mostrar['password'])
        {
            header('Location: iniciar_sesion.php?id=NULL&sesion=false&pass=');
        }
    }
?>

<div class="form-group">
    <p class="h2 text-center">Registrar venta</p>
</div>
<div class="border border-dark container bg-warning rounded-lg font-weight-bold">
    <form action="registrar_venta.php?id=<?= $ide?>&sesion=<?= $Sesion?>&accion=registrar&pass=<?= $pass?>" method="post" enctype="multipart/form-data">
        <br>
        <div class="form-group">
            <div class="col">
                <label for="Nombre">Nombre del producto:</label>
                <input type="text" class="form-control border border-dark" id="Nombre" name="nombre" maxlength="255" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col">
                <label for="Descripcion">Descripcion del producto</label>
                <input class="form-control border border-dark" id="Descripcion" name="descripcion" maxlength="500" required>
            </div>
        </div>
        <div class="form-row container">
            <div class="col">
                <div class="form-group">
                    <label for="Categoria">Categoria</label>
                    <select class="form-control border border-dark" id="Categoria" name="categoria" required>
                        <option value="0">Eliga una categoria</option>
                        <option value="1">celulares y tablets</option>
                        <option value="2">audio y foto</option>
                        <option value="3">computacion</option>
                        <option value="4">consolas y videojuegos</option>
                        <option value="5">hogar</option>
                        <option value="6">electrodomesticos</option>
                        <option value="7">moda</option>
                        <option value="8">relojes y accesorios</option>
                        <option value="9">libros</option>
                        <option value="10">belleza</option>
                        <option value="11">juguetes</option>
                        <option value="12">deportes</option>
                        <option value="13">vehiculos</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="Precio">Precio: </label>
                <div class="input-group ">
                    <div class="input-group-prepend ">
                        <span class="input-group-text border border-dark" id="Pesos">$</span>
                    </div>
                    <input type="text" id="Precio" aria-describedby="Pesos" name="precio" onKeyPress="return SoloNumeros(event)" accept="image/png, image/jpeg" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col">
                <label for="Imagen">Selccione una imagen para su producto:</label>
                <input type="file" id="Imagen" name="imagen" accept="image/png, image/jpeg"required>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success btn-block border-dark">Publicar producto</button>
        </div>
    </form>
</div>

<script type="text/javascript">

    function SoloNumeros(e) {
        var key = window.Event ? e.which : e.keyCode
	    return (key >= 48 && key <= 57)
    }
</script>