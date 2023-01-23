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
        $flowers = $db->selectCollection('flowers');
        if ($flowers->count() == 0) {
            include '../src/database/db-filler-flowers.php';
        }
        $hives = $db->selectCollection('hives');
        if ($hives->count() == 0) {
            include '../src/database/db-filler-hives.php';
        }
        $vue = new MainView([$flowers->find()->toArray(), $hives->find()->toArray()], $this->container);
        $html = $vue->render(0);
        $rs->getBody()->write($html);
        return $rs;    
    }

    public function collection(Request $rq, Response $rs, array $args): Response
    {
        $db = $this->container->get('db');
        $collection = $db->selectCollection('flowers');
        $vue = new MainView([$collection->find()->toArray()], $this->container);
        $html = $vue->render(1);
        $rs->getBody()->write($html);
        return $rs;  
    }

    public function flower(Request $rq, Response $rs, array $args): Response
    {
        $db = $this->container->get('db');
        $collection = $db->selectCollection('flowers');
        $flower = $collection->findOne(['id_flower' => ((int)$args['id_flower'])]);
        $vue = new MainView([$flower], $this->container);
        $html = $vue->render(3);
        $rs->getBody()->write($html);
        return $rs;  
    }
    public function loginuser(Request $rq, Response $rs, array $args): Response
    {
        $vue = new MainView([], $this->container);
        $html = $vue->render(4);
        $rs->getBody()->write($html);
        return $rs;  
    }
    public function createaccount(Request $rq, Response $rs, array $args): Response
    {
        $vue = new MainView([], $this->container);
        $html = $vue->render(5);
        $rs->getBody()->write($html);
        return $rs;  
    }

    
}