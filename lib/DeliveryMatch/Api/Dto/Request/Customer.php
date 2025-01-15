<?php

namespace DeliveryMatch\Api\Dto\Request;

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
