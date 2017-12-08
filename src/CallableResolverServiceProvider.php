<?php declare(strict_types=1);

namespace Ellipse\Handlers;

use Interop\Container\ServiceProviderInterface;

class CallableResolverServiceProvider implements ServiceProviderInterface
{
    public function getFactories()
    {
        return [];
    }

    public function getExtensions()
    {
        return [
            'ellipse.resolvers.handlers' => function ($container, callable $previous = null) {

                $previous = $previous ?: function ($element) {

                    return $element;

                };

                return new CallableResolver($previous);

            },
        ];
    }
}
