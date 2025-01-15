<?php

declare(strict_types=1);

namespace DeliveryMatch;

use DeliveryMatch\Api\Me;
use DeliveryMatch\Api\Shipments;
use DeliveryMatch\HttpClient\Builder;
use DeliveryMatch\HttpClient\Plugin\Authentication;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Discovery\Psr17FactoryDiscovery;

final class Client
{
    private const PRODUCTION_URI = "https://engine.deliverymatch.eu/api/v1";
    private const TEST_URI = "https://engine-test.deliverymatch.eu/api/v1";

    private Builder $httpClientBuilder;

    public function __construct(
        string $apikey,
        int $clientId,
        bool $useProduction = true,
        ?Builder $httpClientBuilder = null
    ) {
        $uri = Psr17FactoryDiscovery::findUriFactory()->createUri($this->getUri($useProduction));
        $this->httpClientBuilder = $httpClientBuilder ?? new Builder();
        $this->httpClientBuilder->addPlugin(new BaseUriPlugin($uri));
        $this->httpClientBuilder->addPlugin(new Authentication($clientId, $apikey));
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->httpClientBuilder->getHttpClient();
    }

    private function getUri(bool $useProduction): string
    {
        return $useProduction ? self::PRODUCTION_URI : self::TEST_URI;
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
