<?php

namespace DeliveryMatch\Api\Dto\Request;

final class Contact
{
    public function __construct(
        public readonly ?string $phoneNumber = null,
        public readonly ?string $email = null,
    ) {
    }
}
