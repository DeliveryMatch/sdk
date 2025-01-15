<?php

declare(strict_types=1);

namespace DeliveryMatch\Api;

use DeliveryMatch\HttpClient\Message\ResponseMediator;

final class Me extends Endpoint
{
    public function isAuthenticated(): array
    {
        $response = $this->client->getHttpClient()->post('/me');
        return ResponseMediator::getContent($response);
    }
}
