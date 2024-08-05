<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 29/05/2020
 * Time: 22:11
 */
include('../../app/config/config.php');

$query = "SELECT * FROM tb_ubicacion WHERE estado ='1' ";

$stmt = $pdo->prepare($query);
$stmt->execute();

$userData = array();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

    $userData[] = $row;
}

echo json_encode($userData);
?>
