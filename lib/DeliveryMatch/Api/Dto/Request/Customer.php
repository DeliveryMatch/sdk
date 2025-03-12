<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api\Dto\Request;

final class Customer
{
    public function __construct(
        public readonly ?Address $address,
        public readonly ?int $id = null,
        public readonly ?Address $billingAddress = null,
        public readonly ?Contact $contact = null,
    ) {
    }
}
