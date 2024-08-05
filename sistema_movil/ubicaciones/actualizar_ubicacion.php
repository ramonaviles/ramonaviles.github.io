<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 28/05/2020
 * Time: 17:43
 */
include ('../../app/config/config.php');

$email = $_POST["email"];
$longitud = $_POST["longitud"];
$latitud = $_POST["latitud"];

//$email = 'diegoyanarico@gmail.com';
//$longitud = '-16.3004994';
//$latitud = '-15.3004994';
date_default_timezone_set("America/Caracas");
$fechaHora =date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("UPDATE tb_ubicacion SET longitud='$longitud', latitud='$latitud', fyh_actualizacion='$fechaHora' WHERE email='$email' ");
//$sentencia->bindParam(':longitud', $longitud);
//$sentencia->bindParam(':email', $email);
//print_r($sentencia);
if($sentencia->execute()){
    echo "success";
    //echo "se actualizando correctamente a la base de datos";
}else{
    //echo "No se pudo actualizar ";
    echo "error";
}
