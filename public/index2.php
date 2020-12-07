<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Teamdev\Ecommerce\Main\Factories\Product\ProductFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write(json_encode(['message' => 'teste']));
    return $response->withHeader('content-type', 'application/json');
});

$app->post('/', function (Request $request, Response $response, $args) {
  $factory = new ProductFactory();
  $createProductController = $factory->makeProductController();
  return $createProductController->handle($request, $response, $args);
});

$app->run();