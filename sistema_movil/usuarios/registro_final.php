<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 23/07/2020
 * Time: 10:50
 */

include('../../app/config/config.php');

$txtNombres = $_POST['nombre'];
$txtCi = $_POST['ci'];
$txtCelular = $_POST['celular'];
$txtCorreo = $_POST['correo'];
$txtContrasena = $_POST['password_user'];
$cargo='CLIENTE';

date_default_timezone_set("America/Caracas");
$fechaHora =date("Y-m-d h:i:s");
$estado = "1";


$email_tabla ='';
$query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email ='$txtCorreo' AND estado = '1' ");
$query->execute();
$usuarios=$query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario){
    $email_tabla = $usuario['email'];
}
if(  (($txtCorreo)==($email_tabla))  ){
   echo "error";
}else{
    $sentencia = $pdo->prepare("INSERT INTO tb_usuarios
      ( nombres, ci, celular, email, password, cargo, fyh_creacion, estado)
VALUES(:nombres,:ci,:celular,:email,:password,:cargo,:fyh_creacion,:estado)");

    $sentencia->bindParam(':nombres',$txtNombres);
    $sentencia->bindParam(':ci',$txtCi);
    $sentencia->bindParam(':celular',$txtCelular);
    $sentencia->bindParam(':email',$txtCorreo);
    $sentencia->bindParam(':password',$txtContrasena);
    $sentencia->bindParam(':cargo',$cargo);

    $sentencia->bindParam(':fyh_creacion',$fechaHora);
    $sentencia->bindParam(':estado',$estado);


    if($sentencia->execute()){
        //echo "success";

        $latitud = '0';
        $longitud = '0';
        $estado_delivery = 'LIBRE';

        $sentencia2 = $pdo->prepare("INSERT INTO tb_ubicacion 
      ( email, latitud, longitud, estado_delivery, cargo, nombre, fyh_creacion, estado) 
VALUES(:email,:latitud,:longitud,:estado_delivery,:cargo,:nombre,:fyh_creacion,:estado)");

        $sentencia2->bindParam(':email',$txtCorreo);
        $sentencia2->bindParam(':latitud',$latitud);
        $sentencia2->bindParam(':longitud',$longitud);
        $sentencia2->bindParam(':estado_delivery',$estado_delivery);
        $sentencia2->bindParam(':cargo',$cargo);
        $sentencia2->bindParam(':nombre',$txtNombres);

        $sentencia2->bindParam(':fyh_creacion',$fechaHora);
        $sentencia2->bindParam(':estado',$estado);
        if($sentencia2->execute()){
            echo "success";
            session_start();
            $_SESSION['u_usuario'] = $txtCorreo;
            header("Location: ".$URL."/sistema_movil/app/principal.php");
        }else{
            echo "error";
        }


    }else {
        echo "error";
    }
}
