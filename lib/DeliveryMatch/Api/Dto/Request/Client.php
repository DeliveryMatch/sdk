<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api\Dto\Request;

final class Client
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $channel = null,
        public readonly ?string $callback = null,
        public readonly string $action = Action::SAVE,
        public readonly string $method = Method::CHEAPEST,
        public readonly bool $filter = false,
        public readonly bool $transportlabel = false,
        public readonly bool $copy = false,
    ) {
    }
}
