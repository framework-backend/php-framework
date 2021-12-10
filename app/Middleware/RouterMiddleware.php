<?php

declare( strict_types=1 );

namespace App\Middleware;

use Framework\Http\Message\Response;
use Framework\Routing\Router;
use Psr\Http\Message\{
    ResponseInterface,
    ServerRequestInterface
};
use Psr\Http\Server\{
    MiddlewareInterface,
    RequestHandlerInterface
};

class RouterMiddleware implements MiddlewareInterface
{
    private Router $router;

    public function __construct()
    {
        $this->router = new Router( [] );
    }

    /**
     * @inheritDoc
     */
    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {
        $requestMethod = $request->getMethod();
        $requestPath = $request->getUri()->getPath();

        $route = $this->router->match( $requestMethod, $requestPath );
        if ( $route ) {
            return new Response( 200 );
        }

        return $handler->handle( $request );
    }
}
