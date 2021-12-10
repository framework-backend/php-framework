<?php

declare( strict_types=1 );

namespace Framework\Http\Message;

use Psr\Http\Message\ResponseInterface;

class Response extends Message implements ResponseInterface
{
    private const REASON_PHRASES = [
        200 => 'OK',
        404 => 'Not Found'
    ];
    private int $statusCode;

    private string $reasonPhrase;

    public function __construct( int $code = 200, string $reasonPhrase = '' )
    {
        $this->statusCode = $code;
        $this->reasonPhrase = $reasonPhrase  !== '' ? $reasonPhrase : self::REASON_PHRASES[ $code ];
    }

    /**
     * @inheritDoc
     */
    public function getStatusCode() : int
    {
        return $this->statusCode;
    }

    /**
     * @inheritDoc
     */
    public function withStatus($code, $reasonPhrase = '') : self
    {
        $this->assertStatusCode( $code );
        $new = clone $this;
        $new->statusCode = $code;
        $new->reasonPhrase = $reasonPhrase  !== '' ? $reasonPhrase : self::REASON_PHRASES[ $code ];
        return $new;
    }

    /**
     * @inheritDoc
     */
    public function getReasonPhrase() : string
    {
        return $this->reasonPhrase;
    }

    private function assertStatusCode( int $code ) : void
    {
        // TODO: Implement assertStatusCode() method.
    }
}
