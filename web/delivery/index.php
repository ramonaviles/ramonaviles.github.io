<?php
include('../../app/config/config.php');

session_start();
if(isset($_SESSION['u_usuario'])) {
    $user = $_SESSION['u_usuario'];
    //echo "session de ".$user; ///////////para comprobar sesion

    $query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$user' AND estado ='1'");
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $id_usuario_s = $usuario['id'];
        $ap_paterno_s = $usuario['ap_paterno'];
        $ap_materno_s = $usuario['ap_materno'];
        $nombres_s = $usuario['nombres'];
        $ci_s = $usuario['ci'];
        $cargo_s = $usuario['cargo'];
        $foto_perfil_s = $usuario['foto_perfil'];
    }
    ?>

    <!DOCTYPE html >
    <html>
    <head>
        <?php include('../../layout/head.php');?>
        <title>Delivery</title>
        <style type="text/css">
            body { font: normal 10pt Helvetica, Arial; }
            #map { width: 100%; height: 500px; border: 0px; padding: 0px; }
        </style>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include('../../layout/menu.php');?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="container">


                        <br><br><br>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><span class="fa fa-motorcycle"></span> Delivery Moto Camba</h3>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-sm">
                                            <th><b>Nº</b></th>
                                            <th><b>Motoquero</b></th>
                                            <th><b>Delivery</b></th>
                                            <th><b>Pedido</b></th>
                                            <?php
                                            $cont_m = 0;
                                            $query2 = $pdo->prepare("SELECT * FROM tb_motoqueros WHERE estado ='1'");
                                            $query2->execute();
                                            $motos = $query2->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($motos as $moto) {
                                                $id_m = $moto['id'];
                                                $ap_paterno_m = $moto['ap_paterno'];
                                                $ap_materno_m = $moto['ap_materno'];
                                                $nombres_m = $moto['nombres'];
                                                $cont_m = $cont_m + 1;
                                                ?>
                                                <tr>
                                                    <td><?php echo $cont_m;?></td>
                                                    <td><?php echo $nombres_m." ".$ap_paterno_m." ".$ap_materno_m;?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>

                        <br><br><br>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><span class="fa fa-motorcycle"></span> Delivery Moto Camba</h3>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>



                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include('../../layout/footer.php');?>
    </div>
    <?php include('../../layout/footer_link.php');?>


    <script>
        /*(function(exports) {
            exports.markers = [];
            var title;
            function initMap() {
                var infoWindow = new google.maps.InfoWindow;

                exports.map = new google.maps.Map(document.getElementById("map"), {
                    center: new google.maps.LatLng(-16.0704139, -65.5969469),
                    zoom: 6
                });

                setInterval(function() {
                    //alert('asdf');
                    deleteMarkers();

                  /*  $query2 = $pdo->prepare("SELECT * FROM tb_ubicacion WHERE estado = '1'");
                    $query2->execute();
                    $marks = $query2->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($marks as $mark) {
                    $email = $mark['id_motoquero'];
                    $latitud = $mark['latitud'];
                    $longitud = $mark['longitud'];
                    $estado = $mark['estado_delivery'];
                    ?>
                    //alert('5');




                    var image = {
                        url:
                            "http://localhost/delivery/public/imagenes/localizacionmotoquero.png",
                        size: new google.maps.Size(35, 60),origin: new google.maps.Point(0, 0), anchor: new google.maps.Point(0, 32)
                    };
                    var marker = new google.maps.Marker({

                        map: map,
                        title:title
                    });



                }, 5000);

            } // Adds a marker to the map and push to the array.

            function addMarker(location) {
                var infoWindow;
                var image = {
                    url:
                        "http://localhost/delivery/public/imagenes/localizacionmotoquero.png",
                    size: new google.maps.Size(35, 60),origin: new google.maps.Point(0, 0), anchor: new google.maps.Point(0, 32)
                };
                var marker = new google.maps.Marker({
                    position: location,
                    map: exports.map,
                    icon: image,
                    title: title
                });
                exports.markers.push(marker);

            } // Sets the map on all markers in the array.

            function setMapOnAll(map) {
                for (var i = 0; i < exports.markers.length; i++) {
                    exports.markers[i].setMap(map);
                }
            } // Removes the markers from the map, but keeps them in the array.

            function clearMarkers() {
                setMapOnAll(null);
            } // Shows any markers currently in the array.

            function showMarkers() {
                setMapOnAll(exports.map);
            } // Deletes all markers in the array by removing references to them.

            function deleteMarkers() {
                clearMarkers();
                exports.markers = [];
            }

            exports.addMarker = addMarker;
            exports.clearMarkers = clearMarkers;
            exports.deleteMarkers = deleteMarkers;
            exports.initMap = initMap;
            exports.setMapOnAll = setMapOnAll;
            exports.showMarkers = showMarkers;
        })((this.window = this.window || {}));
                  */

        var customLabel = {
            restaurant: {
                label: 'R'
            },
            bar: {
                label: 'B'
            }
        };

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(-16.0704139, -65.5969469),
                zoom: 6
            });
            var infoWindow = new google.maps.InfoWindow;

            setInterval(function() {

                var markers;
                var marker;



                // Change this depending on the name of your PHP or XML file
                downloadUrl('http://localhost/delivery/prueba3.php', function(data) {

                    var xml = data.responseXML;
                    markers = xml.documentElement.getElementsByTagName('marker');

                    Array.prototype.forEach.call(markers, function(markerElem) {
                        var id = markerElem.getAttribute('id');
                        var name = markerElem.getAttribute('name');
                        var address = markerElem.getAttribute('address');
                        var type = markerElem.getAttribute('type');
                        var point = new google.maps.LatLng(
                            parseFloat(markerElem.getAttribute('lat')),
                            parseFloat(markerElem.getAttribute('lng')));

                        var infowincontent = document.createElement('div');
                        var strong = document.createElement('strong');
                        strong.textContent = name;
                        infowincontent.appendChild(strong);
                        infowincontent.appendChild(document.createElement('br'));

                        var text = document.createElement('text');
                        text.textContent = address;
                        infowincontent.appendChild(text);
                        var icon = customLabel[type] || {};

                        var image = {
                            url:
                                "http://localhost/delivery/public/imagenes/localizacionmotoquero.png",
                            size: new google.maps.Size(35, 60),origin: new google.maps.Point(0, 0), anchor: new google.maps.Point(0, 32)
                        };


                        marker = new google.maps.Marker({
                            map: map,
                            position: point,
                            icon: image,
                            title: name
                        });

                    });
                });


            }, 2000);


        }


        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    request.onreadystatechange = doNothing;
                    callback(request, request.status);
                }
            };

            request.open('GET', url, true);
            request.send(null);
        }

        function doNothing() {}


    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxvNn7ZfiUUQgyQqXapbCOvChKJ_FMzgM&callback=initMap">
    </script>
    </body>
    </html>

    <?php
}else{
    header("Location: $URL/login");
}
?>




