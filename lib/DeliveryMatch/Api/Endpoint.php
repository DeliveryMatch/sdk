<?php

declare(strict_types=1);

namespace DeliveryMatch\Api;

abstract class Endpoint
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
