<?php

use function Eloquent\Phony\Kahlan\stub;
use function Eloquent\Phony\Kahlan\mock;

use Interop\Http\Server\RequestHandlerInterface;

use Ellipse\Handlers\CallableResolver;
use Ellipse\Handlers\CallableRequestHandler;

describe('CallableResolver', function () {

    beforeEach(function () {

        $this->delegate = stub();

        $this->resolver = new CallableResolver($this->delegate);

    });

    describe('->__invoke()', function () {

        context('when the given element is a callable', function () {

            it('should return it wrapped inside a CallableRequestHandler', function () {

                $element = stub();

                $test = ($this->resolver)($element);

                $handler = new CallableRequestHandler($element);

                expect($test)->toEqual($handler);

            });

        });

        context('when the given element is not a callable', function () {

            it('should proxy the delegate', function () {

                $element = 'element';

                $handler = mock(RequestHandlerInterface::class)->get();

                $this->delegate->with('element')->returns($handler);

                $test = ($this->resolver)($element);

                expect($test)->toBe($handler);

            });

        });

    });

});
