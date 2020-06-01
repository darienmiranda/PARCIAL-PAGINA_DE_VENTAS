<?php 
    include('includes/db.php');

    $email = $_POST["email"];
    $password = $_POST["password"];

    if($_GET['sesion'] == "cerrar")
    {
        header('Location: perfil.php?id=NULL&sesion=false&pass=');
    }

    if($email=="" || $password==""){
        if($email=="")
        {
            echo "<script>
                alert('Porfavor ingrese email');
                window.history.go(-1);
                </script>";
        }else{
            echo "<script>
                alert('Porfavor ingrese contraseña');
                window.history.go(-1);
            </script>";
        }
        die;
        
    }

    $comprobar_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $remail = DB::query($comprobar_email);
    if(mysqli_num_rows($remail) == 0)
    {
        echo "<script>
            alert('El correo no esta registrado');
            window.history.go(-1);
            </script>";
        die;
    }else{
        $rpassword = mysqli_fetch_array($remail);
        if(MD5($password)==$rpassword['password'])
        {
            header("Location: perfil.php?id= ".$rpassword['id']."&sesion=true&pass=".$rpassword['password']);
        }else{
            echo "<script>
            alert('Contraseña incorrecta');
            window.history.go(-1);
            </script>";
        die;
        }
    }
?>