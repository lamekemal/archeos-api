<?php

declare(strict_types=1);

use App\Application\Handlers\HttpErrorHandler;
use App\Application\Handlers\ShutdownHandler;
use App\Application\ResponseEmitter\ResponseEmitter;
use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;
use Slim\Routing\RouteCollectorProxy;

require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, false);

$app->get('/', function (Request $request, Response $response, $args) {
    return $this->get('view')->render($response, 'example.twig', compact('name'));
});

$app->get('/test/{deviceId}', function (Request $request, Response $response, $args) {
    $deviceId = $args['deviceId'];
    $response->getBody()->write("Le numero unique de votre souba est : $deviceId");
    return $response;
});

$app->get('/testsave/{deviceId}&&{devicName}', function (Request $request, Response $response, $args) {
    $deviceId = $args['deviceId'];
    $deviceName = $args['devicName'];
    $response->getBody()->write("Le souba est : $deviceId au nom $deviceName");
    return $response;
});

$app->run();