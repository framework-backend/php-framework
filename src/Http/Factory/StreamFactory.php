<?php

namespace Framework\Http\Factory;

use Psr\Http\Message\{
    StreamFactoryInterface,
    StreamInterface
};

class StreamFactory implements StreamFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createStream( string $content = '' ): StreamInterface
    {
        // TODO: Implement createStream() method.
    }

    /**
     * @inheritDoc
     */
    public function createStreamFromFile( string $filename, string $mode = 'r' ): StreamInterface
    {
        $resource = fopen( $filename, $mode );
        // if ((\stream_get_meta_data($resource)['uri'] ?? '') === 'php://input') {

        debug( \stream_get_meta_data( $resource ) );

        return $this->createStreamFromResource( $resource );
    }

    /**
     * @inheritDoc
     */
    public function createStreamFromResource( $resource ): StreamInterface
    {
        // TODO: Implement createStreamFromResource() method.
    }
}
