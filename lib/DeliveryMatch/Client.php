<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk;

use DeliveryMatch\Sdk\Api\Me;
use DeliveryMatch\Sdk\Api\Shipments;
use DeliveryMatch\Sdk\HttpClient\ApiEnvironment;
use DeliveryMatch\Sdk\HttpClient\Builder;
use DeliveryMatch\Sdk\HttpClient\Plugin\Authentication;
use DeliveryMatch\Sdk\HttpClient\Plugin\DeliveryMatchExceptionThrower;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Discovery\Psr17FactoryDiscovery;

final class Client
{
    private Builder $httpClientBuilder;

    public function __construct(
        string $apikey,
        int $clientId,
        ApiEnvironment $environment = ApiEnvironment::TEST,
        ?Builder $httpClientBuilder = null
    ) {
        $uri = Psr17FactoryDiscovery::findUriFactory()->createUri($environment->getUri());
        $this->httpClientBuilder = $httpClientBuilder ?? new Builder();
        $this->httpClientBuilder->addPlugin(new BaseUriPlugin($uri));
        $this->httpClientBuilder->addPlugin(new Authentication($clientId, $apikey));
        $this->httpClientBuilder->addPlugin(new DeliveryMatchExceptionThrower());
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->httpClientBuilder->getHttpClient();
    }

    public function me(): Me
    {
        return new Me($this);
    }

    public function shipments(): Shipments
    {
        return new Shipments($this);
    }
}
