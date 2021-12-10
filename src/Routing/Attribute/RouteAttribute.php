<?php

namespace Framework\Routing\Attribute;

use Attribute;

#[Attribute]
class RouteAttribute {

    public function __construct(
        private string $method,
        private string $path
    ) {}

    public function getMethod() : string {
        return $this->method;
    }

    public function getPath() : string {
        return trim($this->path, '/');
    }
}
