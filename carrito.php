<?php
    include('includes/db.php');

    if(isset($_GET['accion']))
    {
        $accion = $_GET['accion'];
        $id_usuario = $_GET['id'];
        $id_producto = $_GET['producto'];
        $pass = $_GET['pass'];
        switch ($accion) {
            case 'compra':
                //consultamos todas las compras que hay registradas
                $sql = "SELECT * FROM compras";
                $result = DB::query($sql);
                $cant_compras = mysqli_num_rows($result);

                if($cant_compras >= 0)
                {
                    echo "si hay compras";
                    for($i=1; $i<=$cant_compras; $i++)
                    {
                        $sql = "SELECT * FROM compras WHERE id = '$i'";
                        $result = DB::query($sql);
                        $mostrar = mysqli_fetch_array($result);
                        //Validamos que la compra no se registre nuevamente
                        if($mostrar['persona_id'] == $id_usuario && $mostrar['producto_id'] == $id_producto)
                        {
                            $i = $cant_compras;
                            echo "<script>
                                alert('Este producto ya esta en tu carrito');
                                window.history.go(-1);
                                </script>";
                            die;
                        }
                    }
                    $sql = "INSERT INTO compras(persona_id, producto_id) VALUES('$id_usuario','$id_producto')";
                    DB::query($sql);
                    echo "<script>
                        alert('Añadido con exito');
                        window.history.go(-1);
                        </script>";
                    die;
                }
                break;

            case 'eliminar':
                $id_compra = $_GET['ic'];
                $sql = "DELETE FROM compras WHERE id='$id_compra'";
                DB::query($sql);
                header('location: mis_compras.php?id='.$id_usuario.'&sesion=true&pass='.$pass);
                break;
                
            default:
                echo "<script>
                    alert('No envio ninguna accion a realizar');
                    window.history.go(-1);
                    </script>";
                die;
                break;
        }
    }
?>