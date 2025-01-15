<?php

namespace DeliveryMatch\HttpClient\Plugin;

use Http\Client\Common\Plugin;
use Psr\Http\Message\RequestInterface;
use Http\Promise\Promise;

final class Authentication implements Plugin
{
    private string $apikey;
    private int $clientId;

    public function __construct(int $clientId, string $apikey)
    {
        $this->apikey = $apikey;
        $this->clientId = $clientId;
    }

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $modifiedRequest = $request
            ->withHeader("client", (string) $this->clientId)
            ->withHeader("apikey", $this->apikey);

        return $next($modifiedRequest);
    }
}
