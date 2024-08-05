<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 17/07/2020
 * Time: 14:41
 */

include('../../app/config/config.php');

$id_pedido = $_POST['id_pedido'];
$producto = $_POST['producto'];
$detalle = $_POST['detalle'];
$cantidad = $_POST['cantidad'];
$precio_u = $_POST['precio_u'];
$precio_t = $_POST['precio_t'];

date_default_timezone_set("America/Caracas");
$fechaHora =date("Y-m-d h:i:s");
$estado = "1";

//echo "el producto es ".$producto;

$sentencia2 = $pdo->prepare("INSERT INTO tb_carrito 
      ( id_pedido, producto, detalle, cantidad, precio_unitario, precio_total, fyh_creacion, estado) 
VALUES(:id_pedido,:producto,:detalle,:cantidad,:precio_unitario,:precio_total,:fyh_creacion,:estado)");

$sentencia2->bindParam(':id_pedido',$id_pedido);
$sentencia2->bindParam(':producto',$producto);
$sentencia2->bindParam(':detalle',$detalle);
$sentencia2->bindParam(':cantidad',$cantidad);
$sentencia2->bindParam(':precio_unitario',$precio_u);
$sentencia2->bindParam(':precio_total',$precio_t);

$sentencia2->bindParam(':fyh_creacion',$fechaHora);
$sentencia2->bindParam(':estado',$estado);
if($sentencia2->execute()){
   // header("Location:".$URL."/web/motoqueros");
     //echo "se registro correctamente a la base de datos";
     ?>
    <table class="table table-sm table-bordered" id="tabla_carrito1">
        <th style="background: rgba(214,214,214,0.55)"><b><center>Nro</center></b></th>
        <th style="background: rgba(214,214,214,0.55)"><b>Producto</b></th>
        <th style="background: rgba(214,214,214,0.55)"><b>Detalle</b></th>
        <th style="background: rgba(214,214,214,0.55)"><b><center>Cantidad</center></b></th>
        <th style="background: rgba(214,214,214,0.55)"><b><center>Precio Unitario</center></b></th>
        <th style="background: rgba(214,214,214,0.55)"><b><center>Precio Total</center></b></th>
        <th style="background: rgba(214,214,214,0.55)"><b><center>Acciones</center></b></th>
        <?php
        $contador_carrito = 0;
        $total_cantidades = 0.0;
        $total_precio_unitario = 0.0;
        $total_precio_total = 0.0;
        $query_carrito = $pdo->prepare("SELECT * FROM tb_carrito WHERE id_pedido = '$id_pedido' AND estado ='1'");
        $query_carrito->execute();
        $carritos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
        foreach ($carritos as $carrito) {
            $contador_carrito = $contador_carrito + 1;
            $id_carrito = $carrito['id'];
            $producto = $carrito['producto'];
            $detalle = $carrito['detalle'];
            $cantidad = $carrito['cantidad'];
            $precio_u = $carrito['precio_unitario'];
            $precio_t = $carrito['precio_total'];

            $total_cantidades = $total_cantidades + $cantidad;
            $total_precio_unitario = $total_precio_unitario + $precio_u;
            $total_precio_total = $total_precio_total + $precio_t;

            ?>
            <tr>
                <td><center><?php echo $contador_carrito;?></center></td>
                <td><?php echo $producto;?></td>
                <td><?php echo $detalle;?></td>
                <td><center><?php echo $cantidad;?></center></td>
                <td><center><?php echo $precio_u;?></center></td>
                <td><center><?php echo $precio_t;?></center></td>
                <td>
                    <center>
                        <a href="controller_borrar_carrito.php?id=<?php echo $id_carrito;?>"
                           class="btn btn-danger btn-sm">
                            <span class="fa fa-trash"></span> Borrar
                        </a>
                    </center>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td style="background: rgba(214,214,214,0.55)" colspan="3" align="right"><b>Total</b></td>
            <td style="background: rgba(214,214,214,0.55)"><center><b><?php echo $total_cantidades;?></b></center></td>
            <td style="background: rgba(214,214,214,0.55)"><center><b><?php echo $total_precio_unitario;?></b></center></td>
            <td style="background: rgba(214,214,214,0.55)"><center><b><?php echo $total_precio_total;?></b>
                    <input type="text" id="conto_total_bd" value="<?php echo $total_precio_total;?>" hidden></center></td>
        </tr>
    </table>
<?php
}else{
    echo "No se pudo registrar";
}