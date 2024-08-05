<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 24/07/2020
 * Time: 0:12
 */
include('../../app/config/config.php');


$id_pedido = $_GET['id_p'];
$id_motoquero = $_GET['id_m'];

$estado_pedido = 'ASIGNADO';

$email_motoquero = '';
$query_motoquero = $pdo->prepare("SELECT * FROM tb_usuarios WHERE cargo = 'MOTOQUERO' AND id='$id_motoquero' AND estado ='1' ");
$query_motoquero->execute();
$motoqueros = $query_motoquero->fetchAll(PDO::FETCH_ASSOC);
foreach ($motoqueros as $motoquero) {
    $id_mot = $motoquero['id'];
    $email_motoquero = $motoquero['email'];
}

//echo $id_pedido." - ".$id_motoquero;


$sentencia = $pdo->prepare("UPDATE tb_pedidos SET id_motoquero_asignado='$id_motoquero', estado_pedido='$estado_pedido' WHERE id_pedido='$id_pedido' ");
if($sentencia->execute()){
    header("Location: ".$URL."/web/pedidos/");
   // echo "se actualizo correctamente";
}else{
//echo "No se pudo actualizar ";
    echo "no se puede eliminar el objetivo, comuniquese con el encargado del sistema. Gracias";
}

