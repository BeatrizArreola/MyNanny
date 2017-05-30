<?php
    $servidor = '';
    $usuario = '';
    $password = '';
    $basedatos = 'Padres';

    foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
     $servidor = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
        //$basedatos = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
        $usuario = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
        $password = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
    }

    $conexion = new mysqli($servidor, $usuario, $password, $basedatos);

    if ($conexion->connect_error){
        die("Falló la conexion: " . $conexion->connect_error);
    }
?>