<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 16/07/2020
 * Time: 12:07
 */

include('../../app/config/config.php');

$nombre_direccion = $_POST['nombre_direccion'];
$direccion = $_POST['direccion'];
$referencia = $_POST['referencia'];
$email = $_POST['email'];

date_default_timezone_set("America/Caracas");
$fechaHora =date("Y-m-d h:i:s");
$estado = "1";

    $sentencia = $pdo->prepare("INSERT INTO tb_mis_direcciones 
      ( email, nombre_direccion, direccion, referencia, fyh_creacion, estado) 
VALUES(:email,:nombre_direccion,:direccion,:referencia,:fyh_creacion,:estado)");

    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':nombre_direccion',$nombre_direccion);
    $sentencia->bindParam(':direccion',$direccion);
    $sentencia->bindParam(':referencia',$referencia);

    $sentencia->bindParam(':fyh_creacion',$fechaHora);
    $sentencia->bindParam(':estado',$estado);

    if($sentencia->execute()){
        header("Location: mis_direcciones.php?email=".$email);
    }else{
        echo "No se pudo insertar a la base de datos.";
    }



