<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api\Dto\Request;

final class Contact
{
    public function __construct(
        public readonly ?string $phoneNumber = null,
        public readonly ?string $email = null,
    ) {
    }
}
