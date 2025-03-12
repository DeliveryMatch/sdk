<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api;

use DeliveryMatch\Sdk\Client;

abstract class Endpoint
{
    public function __construct(protected readonly Client $client)
    {
    }
}
