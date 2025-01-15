<?php

declare(strict_types=1);

namespace DeliveryMatch\HttpClient\Message;

use DeliveryMatch\Exception\RuntimeException;
use Psr\Http\Message\ResponseInterface;

final class ResponseMediator
{
    public static function getContent(ResponseInterface $response): array
    {
        $body = $response->getBody()->__toString();

        if (strpos($response->getHeaderLine('Content-Type'), 'application/json') !== 0) {
            throw new RuntimeException("No JSON response");
        }

        $content = json_decode($body, true);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new RuntimeException("Could not decode json");
        }

        return $content;
    }
}
