<?php
include('app/config/config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Removing Markers</title>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxvNn7ZfiUUQgyQqXapbCOvChKJ_FMzgM&callback=initMap">
    </script>
    <style type="text/css">
        #map {
            height: 100%;
        }
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

    </style>
    <script>

        (function(exports) {
            var titlem;
            exports.markers = [];
            function initMap() {

                exports.map = new google.maps.Map(document.getElementById("map"), {
                    center: new google.maps.LatLng(-16.0704139, -65.5969469),
                    zoom: 6
                }); // This event listener will call addMarker() when the map is clicked.

                setInterval(function() {
                    //alert('asdf');
                    deleteMarkers();

                    <?php
                    $query2 = $pdo->prepare("SELECT * FROM markers");
                    $query2->execute();
                    $marks = $query2->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($marks as $mark) {
                        $lat = $mark['lat'];
                        $lng = $mark['lng'];
                        $name = $mark['name'];
                        ?>
                    addMarker({lat: <?php echo $lat;?>,lng: <?php echo $lng;?>});
                     titlem = '<?php echo $name;?>';
                    <?php
                    }
                    ?>

                }, 2000);

            } // Adds a marker to the map and push to the array.

            function addMarker(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: exports.map,
                    title : titlem
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
    </script>
</head>
<body>

<div id="map"></div>

</body>
</html>