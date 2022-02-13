<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class HomeController
{
    private $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function home(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // your code here
        // use $this->view to render the HTML
        // ...

        return $response;
    }
}