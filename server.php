<?php

use App\Products\Controller\CreateProducts;
use App\Products\Controller\GetAllProducts;
use App\Router;
use FastRoute\DataGenerator\GroupPosBased;
use FastRoute\RouteCollector;
use FastRoute\RouteParser\Std;
use React\EventLoop\Factory;
use React\Http\Server;

require_once 'vendor/autoload.php';


$loop = Factory::create();


$routes = new RouteCollector(new Std(), new GroupPosBased());

$routes->get('/products', new GetAllProducts);
$routes->post('/products', new CreateProducts);


$server = new Server(new Router($routes));


$socket = new React\Socket\Server('127.0.0.1:8080', $loop);


$server->listen($socket);

echo "Servidor sendo execultado em " . str_replace('tcp', 'http', $socket->getAddress()) . PHP_EOL;

$loop->run();
