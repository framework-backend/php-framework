<?php

namespace Framework\Http\Message;

use Psr\Http\Message\{
    RequestInterface,
    UriInterface
};

class Request extends Message implements RequestInterface
{
    private string $method;

    private UriInterface $uri;

    public function __construct( string $method, $uri )
    {
        $this->assertMethod( $method );
        $this->method = $method;

        $this->assertUri( $uri );
        $this->uri = ( $uri instanceof UriInterface ) ? $uri : new Uri( $uri );
    }

    /**
     * @inheritDoc
     */
    public function getRequestTarget()
    {
        // TODO: Implement getRequestTarget() method.
    }

    /**
     * @inheritDoc
     */
    public function withRequestTarget( $requestTarget )
    {
        // TODO: Implement withRequestTarget() method.
    }

    /**
     * @inheritDoc
     */
    public function getMethod() : string
    {
        return $this->method;
    }

    /**
     * @inheritDoc
     */
    public function withMethod( $method ) : self
    {
        $this->assertMethod( $method );
        $new = clone $this;
        $new->method = $method;
        return $new;
    }

    /**
     * @inheritDoc
     */
    public function getUri() : UriInterface
    {
        return $this->uri;
    }

    /**
     * @inheritDoc
     */
    public function withUri( UriInterface $uri, $preserveHost = false )
    {
        // TODO: Implement withUri() method.
    }

    private function assertMethod( string $method ) : void
    {
        // TODO: Implement assertMethod() method.
    }

    private function assertUri( $uri ) : void
    {
        if ( !($uri instanceof UriInterface) && !\is_string( $uri ) )
            throw new \InvalidArgumentException( "Invalid argument uri ${uri}" );
    }
}
