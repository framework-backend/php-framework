<?php

declare( strict_types=1 );

namespace Framework\Http\Message;

use Psr\Http\Message\UriInterface;

class Uri implements UriInterface
{
    private string $scheme;

    private string $host;

    private ?int $port;

    private string $user;

    private string $pass;

    private string $path;

    private string $query;

    private string $fragment;

    public function __construct( string $uri = '' )
    {
        $this->scheme = '';
        $this->host = '';
        $this->port = null;
        $this->user = '';
        $this->pass = '';
        $this->path = '';
        $this->query = '';
        $this->fragment = '';

        if ( $uri !== '' ) {
            $parts = \parse_url( $uri );

            if ( $parts === false )
                throw new \InvalidArgumentException( "Unable to parse URI: ${uri}" );

            if ( \array_key_exists( 'path', $parts ) ) {
                $path = \strtolower( $parts[ 'path' ] );
                $this->assertPath( $path );
                $this->path = $path;
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function getScheme() : string
    {
        return $this->scheme;
    }

    /**
     * @inheritDoc
     */
    public function getAuthority()
    {
        // TODO: Implement getAuthority() method.
    }

    /**
     * @inheritDoc
     */
    public function getUserInfo()
    {
        // TODO: Implement getUserInfo() method.
    }

    /**
     * @inheritDoc
     */
    public function getHost() : string
    {
        return $this->host;
    }

    /**
     * @inheritDoc
     */
    public function getPort() : ?int
    {
        return $this->port;
    }

    /**
     * @inheritDoc
     */
    public function getPath() : string
    {
        return $this->path;
    }

    /**
     * @inheritDoc
     */
    public function getQuery() : string
    {
        return $this->query;
    }

    /**
     * @inheritDoc
     */
    public function getFragment() : string
    {
        return $this->fragment;
    }

    /**
     * @inheritDoc
     */
    public function withScheme( $scheme ) : self
    {
        $this->assertScheme( $scheme );
        $new = clone $this;
        $new->scheme = $scheme;
        return $new;
    }

    /**
     * @inheritDoc
     */
    public function withUserInfo( $user, $password = null )
    {
        // TODO: Implement withUserInfo() method.
    }

    /**
     * @inheritDoc
     */
    public function withHost( $host ) : self
    {
        $this->assertHost( $host );
        $new = clone $this;
        $new->host = $host;
        return $new;
    }

    /**
     * @inheritDoc
     */
    public function withPort( $port ) : self
    {
        $this->assertPort( $port );
        $new = clone $this;
        $new->port = $port;
        return $new;
    }

    /**
     * @inheritDoc
     */
    public function withPath( $path ) : self
    {
        $this->assertPath( $path );
        $new = clone $this;
        $new->path = $path;
        return $new;
    }

    /**
     * @inheritDoc
     */
    public function withQuery( $query ) : self
    {
        $this->assertQuery( $query );
        $new = clone $this;
        $new->query = $query;
        return $new;
    }

    /**
     * @inheritDoc
     */
    public function withFragment( $fragment ) : self
    {
        $this->assertFragment( $fragment );
        $new = clone $this;
        $new->fragment = $fragment;
        return $new;
    }

    /**
     * @inheritDoc
     */
    public function __toString() : string
    {
        // TODO: Implement __toString() method.
    }

    private function assertScheme( string $scheme ) : void
    {
        // The trailing ":" character is not part of the scheme and MUST NOT be added.
        // @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.1
        // TODO: Implement assertScheme() method.
    }

    private function assertUser( string $user ) : void
    {
        // @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2.1
        // TODO: Implement assertUser() method.
    }

    private function assertPass( string $user ) : void
    {
        // @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2.1
        // TODO: Implement assertPass() method.
    }

    private function assertHost( string $host ) : void
    {
        // @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2.2
        // TODO: Implement assertHost() method.
    }

    private function assertPort( int $port ) : void
    {
        // @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.2.3
        // TODO: Implement assertPort() method.
    }

    private function assertPath( string $path ) : void
    {
        // @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.3
        // TODO: Implement assertPath() method.
    }

    private function assertQuery( string $query ) : void
    {
        // @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.4
        // TODO: Implement assertQuery() method.
    }

    private function assertFragment( string $fragment ) : void
    {
        // @see https://datatracker.ietf.org/doc/html/rfc3986#section-3.5
        // TODO: Implement assertFragment() method.
    }
}
