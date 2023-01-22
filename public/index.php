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
$app->get('/collection', MainController::class . ':collection')->setName('collection');
$app->get('/scanner_QR[/]', MainController::class . ':lecture_qr')->setName('scanner_QRcode');


try {
  $app->run();
} catch (Throwable $e) {
  echo 'erreur d\'index';
}
