<?php

namespace Framework\Http\Factory;

use Framework\Http\Message\Uri;
use Psr\Http\Message\{
    UriFactoryInterface,
    UriInterface
};

class UriFactory implements UriFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createUri( string $uri = '' ): UriInterface
    {
        return new Uri( $uri );
    }
}
