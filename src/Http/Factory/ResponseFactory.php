<?php

namespace Framework\Http\Factory;

use Framework\Http\Message\Response;
use Psr\Http\Message\{
    ResponseFactoryInterface,
    ResponseInterface
};

class ResponseFactory implements ResponseFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createResponse( int $code = 200, string $reasonPhrase = '' ): ResponseInterface
    {
        return new Response( $code, $reasonPhrase );
    }
}
