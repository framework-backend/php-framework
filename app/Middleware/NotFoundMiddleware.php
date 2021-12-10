<?php

declare( strict_types=1 );

namespace App\Middleware;

use Framework\Http\Message\Response;
use Psr\Http\Message\{
    ResponseInterface,
    ServerRequestInterface
};
use Psr\Http\Server\{
    MiddlewareInterface,
    RequestHandlerInterface
};

class NotFoundMiddleware implements MiddlewareInterface
{
    /**
     * @inheritDoc
     */
    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {
        return new Response( 404 );
    }
}
