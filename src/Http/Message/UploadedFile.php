<?php

declare( strict_types=1 );

namespace Framework\Http\Message;

use Psr\Http\Message\{
    StreamInterface,
    UploadedFileInterface
};

class UploadedFile implements UploadedFileInterface
{
    public function __construct(
        StreamInterface $stream,
        ?int $size = null,
        int $error = \UPLOAD_ERR_OK,
        string $clientFilename = null,
        string $clientMediaType = null
    ) {}

    /**
     * @inheritDoc
     */
    public function getStream()
    {
        // TODO: Implement getStream() method.
    }

    /**
     * @inheritDoc
     */
    public function moveTo($targetPath)
    {
        // TODO: Implement moveTo() method.
    }

    /**
     * @inheritDoc
     */
    public function getSize()
    {
        // TODO: Implement getSize() method.
    }

    /**
     * @inheritDoc
     */
    public function getError()
    {
        // TODO: Implement getError() method.
    }

    /**
     * @inheritDoc
     */
    public function getClientFilename()
    {
        // TODO: Implement getClientFilename() method.
    }

    /**
     * @inheritDoc
     */
    public function getClientMediaType()
    {
        // TODO: Implement getClientMediaType() method.
    }
}