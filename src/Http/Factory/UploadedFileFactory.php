<?php

namespace Framework\Http\Factory;

use Framework\Http\Message\UploadedFile;
use Psr\Http\Message\{
    StreamInterface,
    UploadedFileFactoryInterface,
    UploadedFileInterface
};

class UploadedFileFactory implements UploadedFileFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createUploadedFile(
        StreamInterface $stream,
        int $size = null,
        int $error = \UPLOAD_ERR_OK,
        string $clientFilename = null,
        string $clientMediaType = null
    ): UploadedFileInterface {
        return new UploadedFile( $stream, $size, $error, $clientFilename , $clientMediaType );
    }
}
