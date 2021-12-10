<?php

namespace Framework\Routing;

use ReflectionMethod;

class Route {

    private array $matches;

    public function __construct(
        private string $method,
        private string $path,
        private ReflectionMethod $reflectionMethod
    ) {
        $this->matches = [];
    }

    public function getMethod() : string {
        return $this->method;
    }

    public function getPath() : string {
        return $this->path;
    }

    public function getReflectionMethod() : ReflectionMethod {
        return $this->reflectionMethod;
    }

    public function getMatches() : array {
        return $this->matches;
    }

    public function withMatches( array $matches ) : self {
        $this->matches = $matches;
        return $this;
    }
}
