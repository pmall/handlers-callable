# Callable request handlers resolver

This package provides a resolver producing Psr-15 request handlers from callables.

**Require** php >= 7.1

**Installation** `composer require ellipse/handlers-callable`

**Run tests** `./vendor/bin/kahlan`

- [Using the callable request handlers resolver](#using-the-callable-request-handlers-resolver)

## Using the callable request handlers resolver

```php
<?php

namespace App;

use Some\Psr7Response;

use Ellipse\Handlers\CallableResolver;

// Create a resolver with a delegate for non callable element.
$resolver = new CallableResolver(function ($element) {

    // $element is not a callable, just return it.

    return $element;

});

// Produce a Psr-15 request handler from a callable.
$handler = $resolver(function ($request) {

    // ... Some processing.

    // Return a response.
    return new Psr7Response;

});
```
