<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 24/07/2020
 * Time: 1:45
 */

include('../../app/config/config.php');


$id_pedido = $_GET['id_p'];
$id_motoquero = $_GET['id_m'];

$id_m = '';
$estado_pedido = 'LIBRE';

$sentencia = $pdo->prepare("UPDATE tb_pedidos SET id_motoquero_asignado='$id_m', estado_pedido='$estado_pedido' WHERE id_pedido='$id_pedido' ");
if($sentencia->execute()){
    header("Location: ".$URL."/web/pedidos/");
    //echo "se actualizo correctamente";
}else{
//echo "No se pudo actualizar ";
    echo "no se puede eliminar, comuniquese con el encargado del sistema. Gracias";
}
