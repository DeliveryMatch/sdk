<?php

declare(strict_types=1);

namespace DeliveryMatch\Api\Dto\Request;

final class Sender
{
    public function __construct(
        public readonly Address $address,
        public readonly Sender $sender
    ) {
    }
}
