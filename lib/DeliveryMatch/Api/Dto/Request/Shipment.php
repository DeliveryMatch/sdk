<?php

declare(strict_types=1);

namespace DeliveryMatch\Api\Dto\Request;

use DateTime;

final class Shipment
{
    public function __construct(
        public readonly string $language,
        public readonly string $currency,
        public readonly ?DateTime $firstPickupDate = null,
        public readonly ?string $status = null,
        public readonly ?int $id = null,
        public readonly ?string $orderNumber = null,
        public readonly ?string $reference = null,
        public readonly ?string $carrier = null,
        public readonly ?string $dropoffId = null,
        public readonly ?string $service = null,
        public readonly ?DateTime $deliveryDateTimeFrom = null,
        public readonly ?DateTime $deliveryDateTimeTo = null,
        public readonly ?bool $inbound = null,
        public readonly ?string $incoterm = null,
        public readonly ?string $note = null,
        public readonly ?bool $getDiscounts = null,
        public readonly ?string $instructions = null,
        public readonly ?string $printerChannel = null,
        public readonly ?string $labelSequence = null,
        public readonly bool $endOfShipment = false,
        public readonly ?string $batch = null,
        public readonly ?int $config = null,
    ) {
    }
}
