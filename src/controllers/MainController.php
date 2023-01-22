<?php
declare(strict_types=1);

namespace App\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;
use Illuminate\Database\Capsule\Manager as DB;
use App\views\MainView;

class MainController
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function map(Request $rq, Response $rs, array $args): Response
    {
        $db = $this->container->get('db');
        $collection = $db->selectCollection('flowers');
        if ($collection->count() == 0) {
            include '../src/database/db-filler.php';
        }
        $vue = new MainView([$collection->find()->toArray()], $this->container);
        $html = $vue->render(0);
        $rs->getBody()->write($html);
        return $rs;    
    }

    public function collection(Request $rq, Response $rs, array $args): Response
    {
        $vue = new MainView([], $this->container);
        $html = $vue->render(1);
        $rs->getBody()->write($html);
        return $rs;  
    }
}