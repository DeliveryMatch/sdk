<?php

declare(strict_types=1);

namespace DeliveryMatch\Api;

use DeliveryMatch\Client;

abstract class Endpoint
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
