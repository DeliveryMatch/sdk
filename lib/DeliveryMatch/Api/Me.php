<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api;

use Http\Client\Exception;
use JsonException;

final class Me extends Endpoint
{
    /**
     * @throws Exception
     * @throws JsonException
     */
    public function isAuthenticated(): array
    {
        return $this->client->post('/me');
    }
}
