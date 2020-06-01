<?php 

    if(!isset($_POST['buscar']))
    {
        $_POST['buscar'] = "";
    }

    $buscar = $_POST['buscar'];
    $sql = "SELECT * FROM productos WHERE nombre LIKE '%".$buscar."%' ORDER BY id DESC";
    $resultado = DB::query($sql);

?>