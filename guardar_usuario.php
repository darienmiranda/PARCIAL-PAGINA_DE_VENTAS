<?php
    include('includes/db.php');

    $pass = $_GET['pass'];

    $ide = $_GET["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $celular = $_POST["celular"];
    $whats = $_POST["identificador"];
    $App = $_POST["whatsapp"];
    if($App == "")
    {
        $whatsapp = "No registra";
    }else{
        $whatsapp = $whats." ".$App;
    }

    $direccion = $_POST["direccion"];
    if($direccion=="")
    {
        $direccion="No registra";
    }

    $ciudad = $_POST["ciudad"];
    if($ciudad=="")
    {
        $ciudad="No registra";
    }


    if($nombre=="" ||  $email=="" || $celular==""){
        echo "<script>
                alert('Es necesario llenar los campos obligatorios');
                window.history.go(-1);
            </script>";
        die;
    }

    if($ide != "NULL")
    {
        //Editar Usuario
        $comprobar_email = "SELECT * FROM usuarios WHERE email = '$email' AND id != '$ide'";
        $remail = DB::query($comprobar_email);
        if(mysqli_num_rows($remail) > 0)
        {
            echo "<script>
                alert('El correo ya esta registrado xd');
                window.history.go(-1);
                </script>";
            die;
        }else{
            if($password != "")
            {
                $sql = "UPDATE usuarios set nombre='$nombre', apellido='$apellido',email='$email', password=MD5('$password'), celular='$celular', whatsapp='$whatsapp', direccion='$direccion', ciudad='$ciudad' WHERE id='$ide'";
                DB::query($sql);
                header('Location: perfil.php?id= '.$ide.'&sesion=true&pass='.md5($password));
            }else{
                $sql = "UPDATE usuarios set nombre='$nombre', apellido='$apellido',email='$email',celular='$celular', whatsapp='$whatsapp', direccion='$direccion', ciudad='$ciudad' WHERE id='$ide'";
                DB::query($sql);
                header('Location: perfil.php?id= '.$ide.'&sesion=true&pass='.$pass);
            }
            
        }
        
    }else{
        //Registrar Usuario
        if($password==""){
            echo "<script>
                    alert('Es necesario llenar los campos obligatorios');
                    window.history.go(-1);
                </script>";
            die;
        }
        $comprobar_email = "SELECT * FROM usuarios WHERE email = '$email'";
        $remail = DB::query($comprobar_email);
        if(mysqli_num_rows($remail) > 0)
        {
            echo "<script>
                alert('El correo ya esta registrado');
                window.history.go(-1);
                </script>";
            die;
        }else{
            $sql = "insert into usuarios(nombre, apellido, email, password, celular, whatsapp, direccion, ciudad) values('$nombre', '$apellido', '$email', MD5('$password'), '$celular', '$whatsapp', '$direccion', '$ciudad')";
            DB::query($sql);
            header('Location: iniciar_sesion.php?id=NULL&sesion=false&pass=');
        }
        

    }
?>