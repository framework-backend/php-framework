<?php

namespace Framework\Container;

class Entry
{
    private bool $singleton;

    public function __construct(
        private string $id,
        private mixed $value
    ) {}

    public function getId() : string
    {
        return $this->id;
    }

    public function getValue() : mixed
    {
        return $this->value;
    }

    public function singleton() : self
    {
        $this->singleton = true;

        return $this;
    }
}
