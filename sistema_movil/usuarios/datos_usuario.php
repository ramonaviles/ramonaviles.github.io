<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 18/07/2020
 * Time: 1:26
 */
include('../../app/config/config.php');

$email = $_GET['email'];
//$email = 'hilariweb@gmail.com';

$query = "SELECT * FROM tb_usuarios WHERE email ='$email' AND estado ='1' ";

$stmt = $pdo->prepare($query);
$stmt->execute();

$userData = array();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

    $userData[] = $row;
}

echo json_encode($userData);
?>
