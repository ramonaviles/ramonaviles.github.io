<?php
include('../../app/config/config.php');

/*$txtNombres = $_POST['nombre'];
$txtCi = $_POST['ci'];
$txtCelular = $_POST['celular'];
$txtCorreo = $_POST['correo'];
$txtContrasena = $_POST['password_user'];
$cargo='CLIENTE';
*/

$txtNombres = 'nombre';
$txtCi = 'ci';
$txtCelular = 'celular';
$txtCorreo = 'correo';
$txtContrasena = 'password_user';
$cargo='CLIENTE';

srand (time());
//generamos un número aleatorio
$codigo = rand(99999,1000000);

date_default_timezone_set("America/Caracas");
$fechaHora =date("Y-m-d h:i:s");
$estado = "0";


$email_tabla ='';
$query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email ='$txtCorreo' ");
$query->execute();
$usuarios=$query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario){
    $email_tabla = $usuario['email'];
}
if(  (($txtCorreo)==($email_tabla))  ){
    $sentencia2 = $pdo->prepare("UPDATE tb_usuarios SET token='$codigo' WHERE email='$txtCorreo' ");
    if($sentencia2->execute()){
        echo "success 1";
    }else{
        echo "error";
    }
}else{
    $sentencia = $pdo->prepare("INSERT INTO tb_usuarios
      ( nombres, ci, celular, email, password, token, cargo, fyh_creacion, estado)
VALUES(:nombres,:ci,:celular,:email,:password,:token,:cargo,:fyh_creacion,:estado)");

    $sentencia->bindParam(':nombres',$txtNombres);
    $sentencia->bindParam(':ci',$txtCi);
    $sentencia->bindParam(':celular',$txtCelular);
    $sentencia->bindParam(':email',$txtCorreo);
    $sentencia->bindParam(':password',$txtContrasena);
    $sentencia->bindParam(':token',$codigo);
    $sentencia->bindParam(':cargo',$cargo);

    $sentencia->bindParam(':fyh_creacion',$fechaHora);
    $sentencia->bindParam(':estado',$estado);


    if($sentencia->execute()){
        echo "success 2";
    }else {
        echo "error";
    }
}





