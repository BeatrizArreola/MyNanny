<?php
include ("../configNanny.php");
header("Content-Type: application/json"); 
$sql = "SELECT * FROM nanny";
$registros = $conexion->query($sql);

$nanny = array();

if($registros->num_rows > 0){
    while($nanny = $registros->fetch_assoc()){$nuevaNanny = array ('idNanny' => intval($nanny['idNanny']), 'usuario' => $nanny['usuario'], 'password' => $nanny['password'], 'codigo' => $nanny['codigo'], 'nombre' => $nanny['nombre'], 'apellido' =>    $nanny['apellido'], 'domicilio' => $nanny['domicilio'], 'ciudad' => $nanny['ciudad'], 
    	'edad' => nanny['edad'], 'telefono' => $nanny['telefono'], 'correo' => $nanny['correo'], 'ocupacion' => $nanny['ocupacion'], 'disponibilidad' => $nanny['disponibilidad'], 'target_file1' => $nanny['target_file1'], 'target_file2' => $nanny['target_file2'], 'target_file3' => $nanny['target_file3'], 'target_file4' => $nanny['target_file4'], 'target_file5' => $nanny['target_file5'], 'target_file5' => $nanny['target_file6']);
       
        $nanny[] = $nuevaNanny;
    }
} 
echo json_encode($nanny);
?>