<?php

include ("configNanny.php");    				/////////////////////////////////////hay que editar esta parte
if ($_POST){

	$usuario = $_POST["txtUsuario"];
	$password= $md5 ($password); 
	$codigo = $_POST["txtCodigo"];
	$nombre = $_POST["txtNombre"];
	$apellido = $_POST["txtApellido"];
    $domicilio = $_POST["domicilio"];
	$ciudad= $_POST["txtCiudad"];
	$edad = $_POST["txtEdad"];
	$telefono = $_POST["txtTelefono"];
	$correo= $_POST["txtCorreo"];
	$ocupacion= $_POST["txtOcupacion"];

	$disponibilidad = $_POST["txtDisponibilidad"];

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

 	$target_dir = "imagenes/";
    $target_file4 = $target_dir . basename($_FILES["imgLicencia"]["name"]);
    $file_temp4 = $_FILES["imgLicencia"]["tmp_name"];
    move_uploaded_file($file_temp4, $target_file4);
    
    $target_dir = "imagenes/";
    $target_file5 = $target_dir . basename($_FILES["imgAntecedentes"]["name"]);
    $file_temp5 = $_FILES["imgAntecedentes"]["tmp_name"];
    move_uploaded_file($file_temp5, $target_file5);
    
    
    $target_dir = "imagenes/";
    $target_file6 = $target_dir . basename($_FILES["imgExamen"]["name"]);
    $file_temp6 = $_FILES["imgExamen"]["tmp_name"];
    move_uploaded_file($file_temp6, $target_file6);


    $sql = "INSERT INTO nanny (usuario, password, codigo, nombre, apellido, domicilio, ciudad, edad, telefono, correo, ocupacion, disponibilidad, imgPerfil, imgActa, imgINE, imgLicencia, imgAntecedentes, imgExamen) " .
    "VALUES('{$usuario}', '{$password}', '{$codigo}', '{$nombre}', '{$apellido}', '{domicilio}', '{$ciudad}', '{$edad}', '{$telefono}', '{$correo}', '{$ocupacion}', '{$disponibilidad}', '{$target_file1}', '{$target_file2}', '{$target_file3}', '{$target_file4}', '{$target_file5}', '{$target_file6}')";

    if($conexion->query($sql)== TRUE){ 						//////////////////////////////////////////////checar si se llamara conexion
        echo "Se ha registrado una nueva Nanny";
    } else{
        echo $sql;
        echo error_get_last();
        echo $conexion->error;
        
    }
    $conexion->close();

    echo "Accion Registro Nanny";
}
?>

