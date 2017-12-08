<?php declare(strict_types=1);

namespace Ellipse\Handlers;

use Interop\Http\Server\RequestHandlerInterface;

class CallableResolver
{
    /**
     * The delegate.
     *
     * @var callable
     */
    private $delegate;

    /**
     * Set up a callable request handlers resolver with the given delegate.
     *
     * @param callable $delegate
     */
    public function __construct(callable $delegate)
    {
        $this->delegate = $delegate;
    }

    /**
     * Create a request handler from the given callable or proxy the delegate.
     *
     * @param mixed $element
     * @return \Interop\Http\Server\RequestHandlerInterface;
     */
    public function __invoke($element): RequestHandlerInterface
    {
        if (is_callable($element)) {

            return new CallableRequestHandler($element);

        }

        return ($this->delegate)($element);
    }
}
