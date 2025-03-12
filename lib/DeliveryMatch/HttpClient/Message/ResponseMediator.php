<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\HttpClient\Message;

use DeliveryMatch\Sdk\Exception\RuntimeException;
use Psr\Http\Message\ResponseInterface;

final class ResponseMediator
{
    public static function getContent(ResponseInterface $response): array
    {
        $body = $response->getBody()->__toString();

        if (!str_starts_with($response->getHeaderLine('Content-Type'), 'application/json')) {
            throw new RuntimeException("No JSON response");
        }

        try {
            return json_decode($body, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new RuntimeException("Could not decode json", 0, $e);
        }
    }
}
