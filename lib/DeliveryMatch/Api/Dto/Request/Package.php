<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api\Dto\Request;

final class Package
{
    public function __construct(
        public readonly float $weight,
        public readonly float $width,
        public readonly float $length,
        public readonly float $height,
        public readonly int $packageNum,
        public readonly string $description,
        public readonly int $warehouse = 1,
        public readonly ?string $type = null,
    ) {
    }
}
