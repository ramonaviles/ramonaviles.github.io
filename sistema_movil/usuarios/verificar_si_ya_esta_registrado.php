<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 19/07/2020
 * Time: 18:41
 */

include('../../app/config/config.php');
$email = $_POST['correo'];

$email_tabla ='';
$query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email ='$email' AND estado ='1' ");
$query->execute();
$usuarios=$query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario){
    $email_tabla = $usuario['email'];
}
if(  (($email)==($email_tabla))  ){
    echo "success";
}else{
    echo "error";
}