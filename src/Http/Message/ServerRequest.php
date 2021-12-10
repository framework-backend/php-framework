<?php

declare( strict_types=1 );

namespace Framework\Http\Message;

use Psr\Http\Message\{
    ServerRequestInterface,
    UriInterface
};

class ServerRequest extends Request implements ServerRequestInterface
{
    private array $serverParams;

    private array $cookieParams;

    private array $queryParams;

    private array | object | null $parsedBody;

    private array $attributes;

    private array $uploadedFiles;

    public function __construct( string $method, $uri, array $serverParams = [] )
    {
        parent::__construct(  $method, $uri );
        $this->serverParams = $serverParams;
        $this->cookieParams = [];
        $this->queryParams = [];
        $this->parsedBody = null;
        $this->attributes = [];
        $this->uploadedFiles = [];
    }

    /**
     * @inheritDoc
     */
    public function getServerParams() : array
    {
        return $this->serverParams;
    }

    /**
     * @inheritDoc
     */
    public function getCookieParams() : array
    {
        return $this->cookieParams;
    }

    /**
     * @inheritDoc
     */
    public function withCookieParams(array $cookies)
    {
        // TODO: Implement withCookieParams() method.
    }

    /**
     * @inheritDoc
     */
    public function getQueryParams() : array
    {
        return $this->queryParams;
    }

    /**
     * @inheritDoc
     */
    public function withQueryParams(array $query)
    {
        // TODO: Implement withQueryParams() method.
    }

    /**
     * @inheritDoc
     */
    public function getUploadedFiles() : array
    {
        return $this->uploadedFiles;
    }

    /**
     * @inheritDoc
     */
    public function withUploadedFiles(array $uploadedFiles)
    {
        // TODO: Implement withUploadedFiles() method.
    }

    /**
     * @inheritDoc
     */
    public function getParsedBody() : array | object | null
    {
        return $this->parsedBody;
    }

    /**
     * @inheritDoc
     */
    public function withParsedBody($data)
    {
        // TODO: Implement withParsedBody() method.
    }

    /**
     * @inheritDoc
     */
    public function getAttributes() : array
    {
        return $this->attributes;
    }

    /**
     * @inheritDoc
     */
    public function getAttribute($name, $default = null)
    {
        // TODO: Implement getAttribute() method.
    }

    /**
     * @inheritDoc
     */
    public function withAttribute($name, $value)
    {
        // TODO: Implement withAttribute() method.
    }

    /**
     * @inheritDoc
     */
    public function withoutAttribute($name)
    {
        // TODO: Implement withoutAttribute() method.
    }
}
