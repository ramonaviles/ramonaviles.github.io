<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 14/07/2020
 * Time: 19:29
 */
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    Delivery
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $URL;?>" class="brand-link">
       <!-- <img src="<?php echo $URL;?>/public/icono.png"
             alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8"> -->
        <span class="brand-text font-weight-light"> Delivery</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
           <!-- <div class="image">
                <img src="<?php //echo $URL."/public/imagenes/personal/".$foto_perfil;?>"
                     class="img-circle elevation-2" alt="User Image">
            </div> -->
            <div class="info" style="margin-top: -5px">
                <a href="#" class="d-block" style="color: #f3f3f3">Usuario: <br><?php echo $nombres_s." ".$ap_paterno_s." ".$ap_materno_s;?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

               <?php
               if($cargo_s == "ADMINISTRADOR"){ ?>
                   <li class="nav-item has-treeview">
                       <a href="<?php echo $URL;?>/web/usuarios/" class="nav-link active">
                           <i class="nav-icon fas fa-users"></i>
                           <p>
                               Usuarios
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="<?php echo $URL;?>/web/usuarios/" class="nav-link">
                                   <i class="far fa-user nav-icon"></i>
                                   <p>Listado de usuarios</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="<?php echo $URL;?>/web/usuarios/create" class="nav-link">
                                   <i class="far fa-user nav-icon"></i>
                                   <p>Creación de usuarios</p>
                               </a>
                           </li>
                       </ul>
                   </li>


                   <li class="nav-item has-treeview">
                       <a href="<?php echo $URL;?>/web/motoqueros/" class="nav-link active">
                           <i class="nav-icon fas fa-motorcycle"></i>
                           <p>
                               Motoqueros
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="<?php echo $URL;?>/web/motoqueros/" class="nav-link">
                                   <i class="nav-icon fas fa-motorcycle"></i>
                                   <p>Listado de motoqueros</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="<?php echo $URL;?>/web/motoqueros/create" class="nav-link">
                                   <i class="nav-icon fas fa-motorcycle"></i>
                                   <p>Creación de motoqueros</p>
                               </a>
                           </li>
                       </ul>
                   </li>


                   <li class="nav-item has-treeview">
                       <a href="<?php echo $URL;?>/web/clientes/" class="nav-link active">
                           <i class="nav-icon fas fa-user-tag"></i>
                           <p>
                               Clientes
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="<?php echo $URL;?>/web/clientes/" class="nav-link">
                                   <i class="nav-icon fas fa-motorcycle"></i>
                                   <p>Listado de clientes</p>
                               </a>
                           </li>
                       </ul>
                   </li>


                   <li class="nav-item">
                       <a href="<?php echo $URL;?>/web/delivery" class="nav-link active">
                           <i class="nav-icon fas fa-map-marker-alt"></i>
                           <p>
                               Delivery
                           </p>
                       </a>
                   </li>



                   <li class="nav-item">
                       <a href="<?php echo $URL;?>/web/pedidos" class="nav-link active">
                           <i class="nav-icon fas fa-store"></i>
                           <p>
                               Pedidos
                           </p>
                       </a>
                   </li>


                  <!-- <li class="nav-header">REPORTES</li>

                   <li class="nav-item">
                       <a href="" class="nav-link">
                           <i class="nav-icon fas fa-file"></i>
                           <p>Documentation</p>
                       </a>
                   </li> -->
                <?php
               }
               ?>

                <li class="nav-header">Sesión</li>

                <li class="nav-item">
                    <a href="<?php echo $URL;?>/login/cerrarsesion.php" class="nav-link">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>Cerrar Sesión</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
