<?php

declare(strict_types=1);

namespace DeliveryMatch\Api\Dto\Request;

use DateTime;

final class Product
{
    public function __construct(
        public readonly int $quantity,
        public readonly float $value,
        public readonly float $weight,
        public readonly float $length,
        public readonly float $width,
        public readonly float $height,
        public readonly ?string $description,
        public readonly ?string $id = null,
        public readonly ?int $packageNum = null,
        public readonly int $warehouse = 1,
        public readonly bool $transportlabel = false,
        public readonly ?string $location = null,
        public readonly ?string $content = null,
        public readonly ?string $SKU = null,
        public readonly ?string $EAN = null,
        public readonly ?string $hsCode = null,
        public readonly ?float $volume = null,
        public readonly bool $stock = true,
        public readonly ?DateTime $stockdate = null,
        public readonly ?string $countryOfOrigin = null,
        public readonly ?string $itemGroup = null,
        public readonly ?int $amountPerPackage = null,
        public readonly ?string $custom1 = null,
        public readonly ?string $custom2 = null,
        public readonly ?string $custom3 = null,
        public readonly ?string $custom4 = null,
        public readonly ?string $custom5 = null,
        public readonly ?string $custom6 = null,
        public readonly ?string $custom7 = null,
        public readonly ?string $custom8 = null,
        public readonly ?string $custom9 = null,
        public readonly ?array $warehouses = null,
        public readonly ?DangerousGoods $dangerousGoods = null
    ) {
    }
}
