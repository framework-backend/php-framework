<?php

namespace Framework\Http\Factory;

use Framework\Http\Message\ServerRequest;
use Psr\Http\Message\{
    ServerRequestFactoryInterface,
    ServerRequestInterface,
    UriInterface
};

class ServerRequestFactory implements ServerRequestFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createServerRequest( string $method, $uri, array $serverParams = [] ): ServerRequestInterface
    {
        return new ServerRequest( $method, $uri, $serverParams );
    }
}
