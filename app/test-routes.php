<?php

declare(strict_types=1);

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;

return function (App $app) {
    $app->get('/test-link/{deviceId}', function (RequestInterface $request, ResponseInterface $response, $args) {
        $deviceId = $args['deviceId'];
        $response->getBody()->write("Le numero unique de votre souba est : $deviceId");
        return $response;
    });

    $app->get('/test-var/{deviceId}&&{devicName}', function (RequestInterface $request, ResponseInterface $response, $args) {
        $deviceId = $args['deviceId'];
        $deviceName = $args['devicName'];
        $response->getBody()->write("Le souba est : $deviceId au nom $deviceName");
        return $response;
    });

    $app->get('/test-get/{deviceId}', function (RequestInterface $request, ResponseInterface $response, $args) {
        $ServerdeviceId = "002233";
        $deviceId = $args['deviceId'];
        if ($deviceId == $ServerdeviceId) {
            $response->getBody()->write("FUMIER");
            return $response;
        } else {
            $response->getBody()->write("null");;
            return $response;
        }
    });
};