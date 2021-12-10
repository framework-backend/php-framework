<?php

declare( strict_types=1 );

namespace Framework\Http\Server;

use Framework\Http\Message\Response;
use Psr\Http\Message\{
    ResponseInterface,
    ServerRequestInterface
};
use Psr\Http\Server\{
    MiddlewareInterface,
    RequestHandlerInterface
};

class RequestHandler implements RequestHandlerInterface
{
    /**
     * @param string[] $middlewares
     */
    public function __construct(
        private array $middlewares = []
    ) {}

    public function handle( ServerRequestInterface $request ): ResponseInterface
    {
        if ( count( $this->middlewares ) === 0 )
            return new Response();

        $middleware = new $this->middlewares[ 0 ];
        \array_shift( $this->middlewares );

        return $middleware->process( $request, $this );
    }
}
