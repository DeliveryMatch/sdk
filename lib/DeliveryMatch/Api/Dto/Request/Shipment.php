<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api\Dto\Request;

use DateTime;
use JsonSerializable;

final class Shipment implements JsonSerializable
{
    public function __construct(
        public readonly string $language,
        public readonly string $currency,
        public readonly ?DateTime $firstPickupDate = null,
        public readonly ?string $status = 'new',
        public readonly ?int $id = null,
        public readonly ?string $orderNumber = null,
        public readonly ?string $reference = null,
        public readonly ?string $carrier = null,
        public readonly ?string $dropoffId = null,
        public readonly ?string $service = null,
        public readonly ?DateTime $deliveryDateTimeFrom = null,
        public readonly ?DateTime $deliveryDateTimeTo = null,
        public readonly bool $inbound = false,
        public readonly ?string $incoterm = null,
        public readonly ?string $note = null,
        public readonly bool $getDiscounts = false,
        public readonly ?string $instructions = null,
        public readonly ?string $printerChannel = null,
        public readonly ?string $labelSequence = null,
        public readonly bool $endOfShipment = false,
        public readonly ?string $batch = null,
        public readonly ?int $config = null,
    ) {
    }

    public function jsonSerialize(): mixed
    {
        $formatDate = fn (?DateTime $date, $format) => $date ? $date->format($format) : null;

        return [
            "id" => $this->id,
            "status" => $this->status,
            "orderNumber" => $this->orderNumber,
            "reference" => $this->reference,
            "language" => $this->language,
            "currency" => $this->currency,
            "firstPickupDate" => $formatDate($this->firstPickupDate, 'Y-m-d'),
            "firstPickupDateTime" => $formatDate($this->firstPickupDate, 'Y-m-d H:i'),
            "carrier" => $this->carrier,
            "dropoffId" => $this->dropoffId,
            "service" => $this->service,
            "deliveryDate" => $formatDate($this->deliveryDateTimeFrom, 'Y-m-d'),
            "deliveryTimeFrom" => $formatDate($this->deliveryDateTimeFrom, 'H:i'),
            "deliveryTimeTo" => $formatDate($this->deliveryDateTimeTo, 'H:i'),
            "inbound" => $this->inbound,
            "incoterm" => $this->incoterm,
            "note" => $this->note,
            "getdiscounts" => $this->getDiscounts,
            "instructions" => $this->instructions,
            "printerchannel" => $this->printerChannel,
            "labelSequence" => $this->labelSequence,
            "endOfShipment" => $this->endOfShipment,
            "batch" => $this->batch,
            "config" => $this->config,
        ];
    }

    public function copyWithoutId(): Shipment
    {
        return new Shipment(
            language: $this->language,
            currency: $this->currency,
            firstPickupDate: $this->firstPickupDate,
            status: $this->status,
            id: null,
            orderNumber: $this->orderNumber,
            reference: $this->reference,
            carrier: $this->carrier,
            dropoffId: $this->dropoffId,
            service: $this->service,
            deliveryDateTimeFrom: $this->deliveryDateTimeFrom,
            deliveryDateTimeTo: $this->deliveryDateTimeTo,
            inbound: $this->inbound,
            incoterm: $this->incoterm,
            note: $this->note,
            getDiscounts: $this->getDiscounts,
            instructions: $this->instructions,
            printerChannel: $this->printerChannel,
            labelSequence: $this->labelSequence,
            endOfShipment: $this->endOfShipment,
            batch: $this->batch,
            config: $this->config
        );
    }
}
