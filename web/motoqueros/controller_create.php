<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 16/07/2020
 * Time: 12:07
 */

include('../../app/config/config.php');

$nombres = $_POST['nombres'];
$ap_paterno = $_POST['ap_paterno'];
$ap_materno = $_POST['ap_materno'];
$ci = $_POST['ci'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$genero = $_POST['genero'];
$celular = $_POST['celular'];
$placa = $_POST['placa'];
$email = $_POST['email'];
$password = $_POST['password'];
$cargo = $_POST['cargo'];

date_default_timezone_set("America/Caracas");
$fechaHora =date("Y-m-d h:i:s");
$estado = "1";

$latitud = '0';
$longitud = '0';
$estado_delivery = 'LIBRE';
$nombre_completo = $nombres." ".$ap_paterno." ".$ap_materno;

$email_tabla ='';
$query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email ='$email' AND estado ='1' ");
$query->execute();
$usuarios=$query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario){
    $email_tabla = $usuario['email'];
}
if(  (($email)==($email_tabla))  ){
    echo "<h1>Este usuario ya existe, Revise la lista de Motoqueros</h1>";
}else{
   //echo "usuario nuevo listo para trabajar";
    $sentencia = $pdo->prepare("INSERT INTO tb_usuarios 
      ( nombres, ap_paterno, ap_materno, ci, fecha_nacimiento, genero, celular, placa, email, password, cargo, fyh_creacion, estado) 
VALUES(:nombres,:ap_paterno,:ap_materno,:ci,:fecha_nacimiento,:genero,:celular,:placa,:email,:password,:cargo,:fyh_creacion,:estado)");

    $sentencia->bindParam(':nombres',$nombres);
    $sentencia->bindParam(':ap_paterno',$ap_paterno);
    $sentencia->bindParam(':ap_materno',$ap_materno);
    $sentencia->bindParam(':ci',$ci);
    $sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
    $sentencia->bindParam(':genero',$genero);
    $sentencia->bindParam(':celular',$celular);
    $sentencia->bindParam(':placa',$placa);
    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':password',$password);
    $sentencia->bindParam(':cargo',$cargo);

    $sentencia->bindParam(':fyh_creacion',$fechaHora);
    $sentencia->bindParam(':estado',$estado);

    if($sentencia->execute()){

        $sentencia2 = $pdo->prepare("INSERT INTO tb_ubicacion 
      ( email, latitud, longitud, estado_delivery, cargo, nombre, fyh_creacion, estado) 
VALUES(:email,:latitud,:longitud,:estado_delivery,:cargo,:nombre,:fyh_creacion,:estado)");

        $sentencia2->bindParam(':email',$email);
        $sentencia2->bindParam(':latitud',$latitud);
        $sentencia2->bindParam(':longitud',$longitud);
        $sentencia2->bindParam(':estado_delivery',$estado_delivery);
        $sentencia2->bindParam(':cargo',$cargo);
        $sentencia2->bindParam(':nombre',$nombre_completo);

        $sentencia2->bindParam(':fyh_creacion',$fechaHora);
        $sentencia2->bindParam(':estado',$estado);
        if($sentencia2->execute()){
            header("Location:".$URL."/web/motoqueros");
            // echo "se registro correctamente a la base de datos";
        }else{
            echo "No se pudo registrar en ubiciones";
        }

    }else{
        echo "No se pudo registrar";
    }

}

