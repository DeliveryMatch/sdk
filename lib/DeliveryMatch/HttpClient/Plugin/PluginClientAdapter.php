<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\HttpClient\Plugin;

use Http\Client\Common\PluginClient;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class PluginClientAdapter implements ClientInterface
{
    private PluginClient $pluginClient;

    public function __construct(PluginClient $pluginClient)
    {
        $this->pluginClient = $pluginClient;
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->pluginClient->sendRequest($request);
    }
}
