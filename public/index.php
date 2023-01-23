<?php
declare(strict_types=1);
session_start();
require_once '../vendor/autoload.php';

use Slim\App;
use Slim\Container;
use Illuminate\Database\Capsule\Manager as DB;

use App\controllers\MainController;

$m = new MongoDB\Client('mongodb://mongo');
$db = $m->selectDatabase('flabeilDB');

$container = new Container ([
  'settings' => [
    'displayErrorDetails' => true,
  ],
  'db' => $db,
]);
$app = new App($container);

$app->get('/', MainController::class . ':map')->setName('map');
$app->get('/collection[/]', MainController::class . ':collection')->setName('collection');
$app->get('/loginuser[/]', MainController::class . ':loginuser')->setName('loginuser');
$app->get('/createaccount[/]', MainController::class . ':createaccount')->setName('createaccount');
$app->get('/scanner_QR[/]', MainController::class . ':lecture_qr')->setName('scanner_QRcode');
$app->get('/flowers/{id_flower}[/]', 
function ($rq, $rs, $args) {
    $c = new MainController($this);
    return $c->flower($rq, $rs, $args);
})->setName('flower_details');

try {
  $app->run();
} catch (Throwable $e) {
  echo 'erreur d\'index';
}
