<?php

namespace Framework\Container;

use Psr\Container\ContainerInterface;

abstract class AbstractServiceProvider
{
    public function __construct(
        protected ContainerInterface $container
    ) {}

    public function register() : void
    {

    }
}
