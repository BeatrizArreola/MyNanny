<?php
include ("../configPadres.php");
header("Content-Type: application/json"); 
$sql = "SELECT * FROM padre";
$registros = $conexion->query($sql);

$padre = array();

if($registros->num_rows > 0){
    while($padre = $registros->fetch_assoc()){$nuevoPadre = array ('idPadre' => intval($padre['idPadre']), 'usuario' => $padre['usuario'], 'password' => $padre['password'], 'nombre' => $padre['nombre'], 'apellido' =>    $padre['apellido'], 'domicilio' => $padre['domicilio'], 'ciudad' => $padre['ciudad'], 'telefono' => $padre['telefono'], 'correo' => $padre['correo'], 'target_file1' => $padre['target_file1'], 'target_file2' => $padre['target_file2'], 'target_file3' => $padre['target_file3']);
       
        $padre[] = $nuevoPadre;
    }
} 
echo json_encode($padre);
?>