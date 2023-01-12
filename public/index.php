<?php
// Code source permettant d'accéder aux données parking du Grand Nancy
require __DIR__ . '/vendor/autoload.php';

$m = new MongoDB\Client('mongodb://mongo');
$db = $m->selectDatabase('flabeilDB');
$collection = $db->selectCollection('flowers');

include("index.html");

// Décommenter et lancer la page une fois pour créer les entrées bdd, puis recommenter et relancer la page
//include("db-filler.php");

?>
<script>
  // Map, start position and zoom level
  var map = L.map("map").setView([48.66, 6.155], 15);
  // Limit of map
  map.setMaxBounds([
    [48.664218, 6.150820],
    [48.657579, 6.159649]
  ]);
  // Minimal zoom level
  map.setMinZoom(14);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

const collection = <?php echo json_encode($collection->find()->toArray()); ?>;

let redMarker = L.icon({
  iconUrl: "https://github.com/pointhi/leaflet-color-markers/blob/master/img/marker-icon-red.png?raw=true",
  iconSize: [25, 41]
});
let blueMarker = L.icon({
  iconUrl: "https://github.com/pointhi/leaflet-color-markers/blob/master/img/marker-icon-blue.png?raw=true",
  iconSize: [25, 41]
});
let greenMarker = L.icon({
  iconUrl: "https://github.com/pointhi/leaflet-color-markers/blob/master/img/marker-icon-green.png?raw=true",
  iconSize: [25, 41]
});
let orangeMarker = L.icon({
  iconUrl: "https://github.com/pointhi/leaflet-color-markers/blob/master/img/marker-icon-orange.png?raw=true",
  iconSize: [25, 41]
});
let blackMarker = L.icon({
  iconUrl: "https://github.com/pointhi/leaflet-color-markers/blob/master/img/marker-icon-black.png?raw=true",
  iconSize: [25, 41]
});
let yellowMarker = L.icon({
  iconUrl: "https://github.com/pointhi/leaflet-color-markers/blob/master/img/marker-icon-yellow.png?raw=true",
  iconSize: [25, 41]
});


let icons = [redMarker, blueMarker, greenMarker, orangeMarker, blackMarker, yellowMarker];

collection.forEach(function (doc) {
 
  let colorIcon = icons[doc.id % 6];

  // id nom_lat	nom_fr	hauteur	nectar	pollen	miellat	flor_coul	empl_jardin
    L.marker([doc.x_coord, doc.y_coord], {icon: colorIcon})
    .addTo(map)
    .bindPopup(
      "<b>id</b>: " + doc.id + "<br>" +
      "<b>Nom Latin</b>: " + doc.nom_lat + "<br>" +
      "<b>Nom Français</b>: " + doc.nom_fr + "<br>" +
      "<b>Hauteur</b>: " + doc.hauteur + "<br>" +
      "<b>Nectar</b>: " + doc.nectar + "<br>" +
      "<b>Pollen</b>: " + doc.pollen + "<br>" +
      "<b>Miellat</b>: " + doc.miellat + "<br>" +
      "<b>Couleurs / Floraison</b>: " + doc.flor_coul + "<br>" +
      "<b>Emplacement</b>: " + doc.empl_jardin + "<br>"
    )
});


</script>