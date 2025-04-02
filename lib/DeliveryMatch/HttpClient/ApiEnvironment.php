<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\HttpClient;

enum ApiEnvironment: string
{
    case TEST = "test";
    case PRODUCTION = "production";

    public function getUri(): string
    {
        return match ($this) {
            self::TEST => "https://engine-test.deliverymatch.eu/api/v1",
            self::PRODUCTION => "https://engine.deliverymatch.eu/api/v1",
        };
    }
}
