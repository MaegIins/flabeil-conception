<?php 

$hives = [];

$db = (new MongoDB\Client('mongodb://mongo'))->selectDatabase('flabeilDB');
$db->createCollection('hives');
$db = $db->selectCollection('hives');

$hives[] =
[
  'id_hive'=> 1,
  'x_coord'=> 48.662900,
  'y_coord'=> 6.153985,
];

if (count($hives) > 0) {
  $res = $db->insertMany($hives);
}