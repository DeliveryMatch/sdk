<?php

namespace DeliveryMatch\Api\Dto\Request;

final class DangerousGoods
{
    public function __construct(
        public readonly ?string $technicalName = null,
        public readonly ?string $shippingName = null,
        public readonly ?string $mainDanger = null,
        public readonly ?string $class = null,
        public readonly ?string $subclass = null,
        public readonly ?int $packingGroup = null,
        public readonly ?int $UN = null,
        public readonly ?string $UNP = null,
        public readonly ?float $grossMass = null,
        public readonly ?float $netMass = null,
        public readonly ?string $massUnit = null,
        public readonly ?bool $LQ = null,
        public readonly ?string $NOS = null,
        public readonly ?bool $environmentHazzard = null,
        public readonly ?string $tunnelCode = null,
        public readonly ?string $classificationCode = null,
        public readonly ?string $packingType = null,
        public readonly ?string $propperties = null,
        public readonly ?string $labels = null,
        public readonly ?string $transportCategory = null,
    ) {
    }
}
