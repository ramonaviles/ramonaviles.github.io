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

        var map;
        var markersArray = [];

        function initialize() {
            var haightAshbury = new google.maps.LatLng(37.7699298, -122.4469157);
            var mapOptions = {
                zoom: 12,
                center: haightAshbury,
                mapTypeId: google.maps.MapTypeId.TERRAIN
            };
            map =  new google.maps.Map(document.getElementById("map"), mapOptions);

            google.maps.event.addListener(map, 'click', function(event) {
                addMarker(event.latLng);
            });
        }

        function addMarker(location) {
            marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markersArray.push(marker);
        }

        // Removes the overlays from the map, but keeps them in the array
        function clearOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
            }
        }

        // Shows any overlays currently in the array
        function showOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(map);
                }
            }
        }

        // Deletes all markers in the array by removing references to them
        function deleteOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
                markersArray.length = 0;
            }
        }
    </script>
</head>
<body>

<div id="map"></div>
asdf
</body>
</html>