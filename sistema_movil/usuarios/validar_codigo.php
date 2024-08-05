<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 19/07/2020
 * Time: 18:37
 */
include('../../app/config/config.php');
$email = $_POST['correo'];
$token = $_POST['token'];
$estado = '1';


$email_tabla ='';
$token_tabla ='';
$query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email ='$email' AND token ='$token' ");
$query->execute();
$usuarios=$query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario){
    $email_tabla = $usuario['email'];
    $token_tabla = $usuario['token'];
    $nombre = $usuario['nombres'];
    $ap_paterno = $usuario['ap_paterno'];
    $ap_materno = $usuario['ap_materno'];
    $cargo = $usuario['cargo'];
}

$latitud = '0';
$longitud = '0';
$estado_delivery = 'LIBRE';
$nombre_completo = $nombre." ".$ap_paterno." ".$ap_materno;

if(  (($email)==($email_tabla)) && (($token)==($token_tabla)) ){

    $sentencia = $pdo->prepare("UPDATE tb_usuarios SET estado='$estado' WHERE email='$email' ");
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
            echo "success";
        }else{
            echo "No se pudo registrar en ubiciones";
        }

    }else{
        echo "error";
    }
}else{
    echo "error";
}