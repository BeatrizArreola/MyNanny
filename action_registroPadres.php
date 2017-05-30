<?php

include ("configPadres.php");     ///////////////////////////////hay que editar esta parte
if ($_POST){

	$usuario = $_POST["txtUsuario"];
	$password= $md5 ($password); //encriptacion de password
	$nombre = $_POST["txtNombre"];
	$apellido = $_POST["txtApellido"];
	$domicilio = $_POST["txtDomicilio"];
	$ciudad= $_POST["txtCiudad"];
	$telefono = $_POST["txtTelefono"];
	$correo= $_POST["txtCorreo"];


  	$target_dir = "imagenes/";
    $target_file1 = $target_dir . basename($_FILES["imgPerfil"]["name"]);
    $file_temp1 = $_FILES["imgPerfil"]["tmp_name"];
    move_uploaded_file($file_temp1, $target_file1);
    
    $target_dir = "imagenes/";
    $target_file2 = $target_dir . basename($_FILES["imgActa"]["name"]);
    $file_temp2 = $_FILES["imgActa"]["tmp_name"];
    move_uploaded_file($file_temp2, $target_file2);
    
    
    $target_dir = "imagenes/";
    $target_file3 = $target_dir . basename($_FILES["imgINE"]["name"]);
    $file_temp3 = $_FILES["imgINE"]["tmp_name"];
    move_uploaded_file($file_temp3, $target_file3);

    $hijos= $_POST["txtHijos"];


	

    $sql = "INSERT INTO padres (usuario, password, nombre, apellido, domicilio, ciudad, telefono, correo, imgPerfil, imgActa, imgINE, hijos) " .
    "VALUES('{$usuario}', '{$password}', '{$nombre}', '{$apellido}', '{$domicilio}', '{$ciudad}', '{$telefono}', '{$correo}', '{$target_file1}', '{$target_file2}', '{$target_file3}', '{$hijos}')";

    if($conexion->query($sql)== TRUE){ 						//////////////////////////////////////////////checar si se llamara conexion
        echo "Se ha registrado un nuevo Padre";
    } else{
        echo $sql;
        echo error_get_last();
        echo $conexion->error;
        
    }
    $conexion->close();

    echo "Accion Registro Padre";
}
?>

