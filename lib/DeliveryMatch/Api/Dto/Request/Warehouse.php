<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api\Dto\Request;

use DateTime;

final class Warehouse
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?DateTime $stockdate = null
    ) {
    }
}
