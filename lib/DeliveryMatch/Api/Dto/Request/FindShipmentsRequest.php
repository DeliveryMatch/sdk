<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api\Dto\Request;

use DateTime;

final class FindShipmentsRequest
{
    public function __construct(
        public readonly DateTime $dateFrom,
        public readonly DateTime $dateTo,
        public readonly ?string $status = null,
        public readonly ?string $channel = null
    ) {
    }
}
