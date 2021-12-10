<?php

declare( strict_types=1 );

use Framework\Container\Container;

define( 'APP_START', microtime( true ) );
define( 'ROOT_APP', dirname( __DIR__ ) );

require_once ROOT_APP . '/vendor/autoload.php';

class Foo {}
class Bar {
    public function __construct(
        private Foo $foo
    ) {}
}

$container = new Container();

$container->set( Foo::class )->singleton();

if ( $container->has( Foo::class ) )
{
    $entry = $container->get( Foo::class );
    debug( $entry->getValue() );
}
