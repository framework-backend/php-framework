<?php

namespace Framework\Database\Attribute;

use Attribute;

#[Attribute]
class Column {

    public function __construct(
        private string $type,
        private bool $autoIncrement = false,
        private ?int $length = null,
        private bool $primaryKey = false,
        private bool $nullable = false,
        private mixed $default = null,
    ) {}

    public function getType() : string {
        return $this->type;
    }

    public function getAutoIncrement() : bool {
        return $this->autoIncrement;
    }

    public function getLength() : ?int {
        return $this->length;
    }

    public function getPrimaryKey() : bool {
        return $this->primaryKey;
    }

    public function getNullable() : bool {
        return $this->nullable;
    }

    public function getDefault() : mixed {
        return $this->default;
    }
}
