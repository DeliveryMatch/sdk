<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api\Dto\Request;

final class Address
{
    public function __construct(
        public readonly string $address1,
        public readonly string $postcode,
        public readonly string $city,
        public readonly string $country,
        public readonly ?string $companyName = null,
        public readonly ?string $street = null,
        public readonly ?string $houseNo = null,
        public readonly ?string $state = null,
        public readonly ?string $zone = null,
        public readonly ?string $name = null,
        public readonly ?string $address2 = null,
        public readonly ?string $houseNoExt = null,
    ) {
    }
}
