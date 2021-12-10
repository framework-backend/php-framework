<?php

namespace Framework\Container;

use Framework\Container\Exception\EntryNotFoundException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function __construct()
    {
        $this->entries = [];
    }

    public function set( string $id, mixed $value = null ) : Entry
    {
        $entry = new Entry( $id, $value ?? $id );
        $this->entries[ $id ] = $entry;
        return $entry;
    }

    /**
     * @inheritDoc
     */
    public function get( string $id ) : mixed
    {
        return $this->has(  $id ) ? $this->entries[ $id ] : throw new EntryNotFoundException( "No entry was found for ${id} identifier." );
    }

    /**
     * @inheritDoc
     */
    public function has( string $id ): bool
    {
        return \array_key_exists( $id, $this->entries );
    }
}
