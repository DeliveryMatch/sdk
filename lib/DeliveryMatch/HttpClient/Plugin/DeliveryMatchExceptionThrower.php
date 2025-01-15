<?php

declare(strict_types=1);

namespace DeliveryMatch\HttpClient\Plugin;

use Http\Client\Common\Plugin;
use Psr\Http\Message\RequestInterface;
use Http\Promise\Promise;
use Psr\Http\Message\ResponseInterface;

final class DeliveryMatchExceptionThrower implements Plugin
{
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        return $next($request)->then(onFulfilled: function (ResponseInterface $response) {
            $statusCode = $response->getStatusCode();

            if (!str_starts_with((string) $statusCode, "2")) {
            }
        });
    }
}
