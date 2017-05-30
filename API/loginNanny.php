<?php
include ("../configNanny.php");
header("Content-Type: application/json"); 
if($_POST){
    //isset verifica que tenga un valor asignado
    if(isset($_POST['usuario']) & isset($_POST['password'])){
        $usuario = $_POST['usuario'];
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM nanny WHERE usuario = '{$usuario}' AND password = '{$password}'";
        $consulta = $conexion->query($sql);
        if($registros->num_rows > 0){
            //si se encontro el usuario
            $usuario = $registros-> fetch_assoc();
            $resultado = array('success' =>, 'usuario' => $usuario);
        } else{
            $resultado = array('success' => 0, 'error' => 'Usuario o contraseña incorrecta');
        }
    } else{
        $resultado = array('success' => 0, 'error' => 'No se enviaron todos los campos');
    }
} else {
    $resultado = array('success' => 0, 'error' => 'Método no aceptado');
}
echo json_encode($resultado);
?>