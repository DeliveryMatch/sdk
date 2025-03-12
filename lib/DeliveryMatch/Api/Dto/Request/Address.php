<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api\Dto\Request;

final class Address
{
    public function __construct(
        public readonly string $companyName,
        public readonly string $address1,
        public readonly string $street,
        public readonly string $houseNo,
        public readonly string $postcode,
        public readonly string $city,
        public readonly string $country,
        public readonly ?string $state = null,
        public readonly ?string $zone = null,
        public readonly ?string $name = null,
        public readonly ?string $address2 = null,
        public readonly ?string $houseNoExt = null,
    ) {
    }
}
