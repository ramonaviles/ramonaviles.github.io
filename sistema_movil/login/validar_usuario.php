<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 17/07/2020
 * Time: 22:01
 */

include ('../../app/config/config.php');

$email = $_POST['email'];
$pass = $_POST['password'];

//$email ='hilariweb@gmail.com';
//$pass = '12345678';
$email_tabla = "";
$password_tabla="";

$query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email ='$email' AND password ='$pass' AND estado ='1' ");
$query->execute();
$usuarios=$query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario){
    $email_tabla = $usuario['email'];
    $password_tabla = $usuario['password'];
}
if(  (($email)==($email_tabla))  && (($pass)==($password_tabla))  ){
    echo "success";
    session_start();
    $_SESSION['u_usuario'] = $email;
    header("Location: ".$URL."/sistema_movil/app/principal.php");
}else{
    echo "error";
}