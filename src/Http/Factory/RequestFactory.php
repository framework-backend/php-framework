<?php

namespace Framework\Http\Factory;

use Framework\Http\Message\Request;
use Psr\Http\Message\{
    RequestFactoryInterface,
    RequestInterface,
    UriInterface
};

class RequestFactory implements RequestFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createRequest( string $method, $uri ): RequestInterface
    {
        return new Request( $method, $uri );
    }
}
