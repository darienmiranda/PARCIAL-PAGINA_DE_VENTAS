<?php
    include('includes/db.php');

    $accion = $_GET['accion'];
    $pass = $_GET['pass'];
    switch($accion)
    {
        case 'registrar':
            //Registrar un producto para vender
            

            $id_persona = $_GET["id"];
            $nombre = $_POST["nombre"];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];

            $nombreimg = $_FILES['imagen']['name'];
            $archivo = $_FILES['imagen']['tmp_name'];
            $ruta = "productos";

            $ruta = $ruta."/".$categoria."/".$nombreimg;

            move_uploaded_file($archivo,$ruta);
            
            $estado="activo";
            $fecha = date("Y-m-d");

            if($categoria <= 0 || $categoria > 13)
            {
                echo  "<script>
                    alert('Es necesario seleccionar una categoria');
                    window.history.go(-1);
                    </script>";
                die;
            }
            $sql = "INSERT INTO productos(persona_id, nombre, descripcion, precio, categoria_id, img_producto, estado, fecha) VALUES('$id_persona', '$nombre', '$descripcion', '$precio', '$categoria','$ruta','$estado', '$fecha')";
            
            DB::query($sql);
            header('Location: perfil.php?id= '.$id_persona.'&sesion=true&pass='.$pass);
        break;

        case 'eliminar':
            $id_producto = $_GET['producto'];
            $id_persona = $_GET['id'];
            $sql = "DELETE FROM productos WHERE id='$id_producto'";
            DB::query($sql);
            header('location: perfil.php?id='.$id_persona.'&sesion=true&pass='.$pass);
        break;

        case 'inactivar':
            $id_producto = $_GET['producto'];
            $id_persona = $_GET['id'];
            $sql = "UPDATE productos SET estado = 'inactivo' WHERE id = '$id_producto' ";
            DB::query($sql);
            header('location: detalle_producto.php?id='.$id_persona.'&sesion=true&producto='.$id_producto.'&pass='.$pass);
        break;

        case 'activar':
            $id_producto = $_GET['producto'];
            $id_persona = $_GET['id'];
            $sql = "UPDATE productos SET estado = 'activo' WHERE id = '$id_producto' ";
            DB::query($sql);
            header('location: detalle_producto.php?id='.$id_persona.'&sesion=true&producto='.$id_producto.'&pass='.$pass);
        break;

        case 'editar':
            $id_persona = $_GET["id"];
            $id_producto = $_GET['producto'];
            $nombre = $_POST["nombre"];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];
            $estado = $_POST['estado'];

            if($categoria <= 0 || $categoria > 13)
            {
                echo  "<script>
                    alert('Es necesario seleccionar una categoria');
                    window.history.go(-1);
                    </script>";
                die;
            }

            $nombreimg = $_FILES['imagen']['name'];
            if($nombreimg=="")
            {
                $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', categoria_id='$categoria', estado='$estado' WHERE id = '$id_producto'";
                echo $pass;
                DB::query($sql);
                header('location: detalle_producto.php?id='.$id_persona.'&sesion=true&producto='.$id_producto.'&pass='.$pass);
            }else{
                $archivo = $_FILES['imagen']['tmp_name'];
                $ruta = "productos";

                $ruta = $ruta."/".$categoria."/".$nombreimg;
                move_uploaded_file($archivo,$ruta);

                echo $nombre."<br>";
                echo $id_persona."<br>";
                echo $descripcion."<br>";
                echo $precio."<br>";
                echo $categoria."<br>";
                echo $nombreimg."<br>";
                $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', categoria_id='$categoria', img_producto='$ruta', estado='$estado' WHERE id = '$id_producto'";
                DB::query($sql);
                header('location: detalle_producto.php?id='.$id_persona.'&sesion=true&producto='.$id_producto.'&pass='.$pass);
            }
        break;

        default:
            echo "esto es una prueb";
        break;
    }
    
    /*if(DB::query($sql)){ //if($con->query($query) == true)
        echo "Persona guardada correctamente <br>";
    }else{
        echo "No se ha podido guardar la persona <br>";
    }*/

?>