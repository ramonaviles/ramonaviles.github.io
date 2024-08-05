<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 18/07/2020
 * Time: 10:20
 */
include('../../app/config/config.php');

$email = $_GET['email'];

date_default_timezone_set("America/Caracas");
$fechaHora =date("Y-m-d h:i:s");
$estado = '0';

$sentencia = $pdo->prepare("UPDATE tb_usuarios SET estado='$estado', fyh_eliminacion='$fechaHora' WHERE email='$email' ");
if($sentencia->execute()){
    header("Location: ".$URL."/web/motoqueros/");
}else{
//echo "No se pudo actualizar ";
    echo "no se puede eliminar, comuniquese con el encargado del sistema. Gracias";
}
