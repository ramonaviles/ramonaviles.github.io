<?php
/**
 * Created by PhpStorm.
 * User: SISTEMAS
 * Date: 18/09/2019
 * Time: 11:05
 */

include ('../../app/config/config.php');


session_start();
if(isset($_SESSION['u_usuario'])) {
    $user = $_SESSION['u_usuario'];
    session_destroy();
    header("Location: ".$URL."/sistema_movil/login");

}
?>