<?php 

    $title = "Editar producto";
    include('templates/header.php');
    $id_producto = $_GET['producto'];

    $sql = "SELECT * FROM productos WHERE id = '$id_producto'";
    $producto = DB::query($sql);
    $producto = mysqli_fetch_object($producto);
?>
<div class="form-group">
    <div class="h2 text-center">
        Editar producto
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 16" width="18" height="20"><path fill-rule="evenodd" d="M0 12v3h3l8-8-3-3-8 8zm3 2H1v-2h1v1h1v1zm10.3-9.3L12 6 9 3l1.3-1.3a.996.996 0 011.41 0l1.59 1.59c.39.39.39 1.02 0 1.41z"></path></svg>
    </div>

</div>
<div class="border border-dark container bg-warning rounded-lg font-weight-bold">
    <form action="registrar_venta.php?id=<?= $ide?>&sesion=<?= $Sesion?>&producto=<?= $id_producto?>&accion=editar&pass=<?= $pass?>" method="post" enctype="multipart/form-data">
        <br>
        <div class="form-group">
            <div class="col">
                <label for="Nombre">Nombre del producto:</label>
                <input type="text" class="form-control border border-dark" id="Nombre" name="nombre" maxlength="255" value="<?= $producto->nombre ?>" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col">
                <label for="Descripcion">Descripcion del producto</label>
                <input class="form-control border border-dark" id="Descripcion" name="descripcion" maxlength="500" value="<?= $producto->descripcion ?>" required>
            </div>
        </div>
        <div class="form-row container">
            <div class="col">
                <div class="form-group">
                    <label for="Categoria">Categoria</label>
                    <select class="form-control border border-dark" id="Categoria" name="categoria"  required>
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
                    <input type="text" id="Precio" aria-describedby="Pesos" name="precio" onKeyPress="return SoloNumeros(event)" value="<?= $producto->precio ?>" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col">
                <label for="Imagen">Selccione una imagen para su producto:</label>
                <input type="file" id="Imagen" name="imagen" accept="image/png, image/jpeg">
            </div>
        </div>
        <div class="form-group">
            <div class="col">
                <label for="Estado">Estado:</label>
            </div>
            <div class="container">
                <div class="custom-control custom-radio" >
                    <input type="radio" id="Radio1" name="estado" class="custom-control-input" value="activo" checked>
                    <label class="custom-control-label" for="Radio1">Activo</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="Radio2" name="estado" class="custom-control-input" value="inactivo">
                    <label class="custom-control-label" for="Radio2">Inactivo</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success btn-block border-dark">Actualizar producto</button>
        </div>
    </form>
    <button type="submit" class="btn btn-lg btn-danger btn-block border-dark" onclick="volver()">Cancelar</button>
</div>