<?php

namespace Framework\Database\Attribute;

use Attribute;

#[Attribute]
class Entity {

    public function __construct(
        private string $repositoryClass
    ) {}
}
