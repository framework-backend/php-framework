<?php

namespace Framework\Routing;

use ReflectionClass;
use ReflectionException;
use function array_shift;
use function preg_match;
use function trim;

class Router {

    private array $routes = [];

    /**
     * Router constructor
     *
     * @throws ReflectionException
     */
    public function __construct(
        array $controllers
    ) {
        foreach (
            $controllers
            as $controller
        ) {
            $reflectionClass = new ReflectionClass( $controller );
            $reflectionMethods = $reflectionClass->getMethods();
            foreach (
                $reflectionMethods
                as $method
            ) {
                $reflectionAttributes = $method->getAttributes();
                foreach (
                    $reflectionAttributes
                    as $attribute
                ) {
                    $options = $attribute->newInstance();
                    $routeMethod = $options->getMethod();
                    $route = new Route( $routeMethod, $options->getPath(), $method );
                    $this->routes[ $routeMethod ][] = $route;
                }
            }
        }
    }

    /**
     * @param string $requestMethod
     * @param string $requestUri
     * @return false|Route
     */
    public function match( string $requestMethod, string $requestUri ) : false | Route {
        if ( !array_key_exists( $requestMethod, $this->routes ) ) return false;

        $routes = $this->routes[ $requestMethod ];
        foreach (
            $routes
            as $route
        ) {
            $routePath = $route->getPath();
            $pattern = "#^$routePath$#";

            if ( preg_match($pattern, trim($requestUri, '/'), $matches) ) {
                array_shift( $matches );
                return $route->withMatches( $matches );
            }
        }

        return false;
    }
}
