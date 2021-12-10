<?php

namespace Framework\Container\Exception;

use Psr\Container\ContainerExceptionInterface;
use Exception;

/**
 * Base interface representing a generic exception in a container.
 */
class ContainerException extends Exception implements ContainerExceptionInterface
{
}
