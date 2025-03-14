<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api\Dto\Request;

use JsonSerializable;

final class ShipmentRequest implements JsonSerializable
{
    public function __construct(
        public readonly Client $client,
        public readonly Customer $customer,
        public readonly Shipment $shipment,
        public readonly array $packages,
        public readonly array $products,
        public readonly float $priceIncl,
        public readonly float $weight,
        public readonly bool $fragileGoods = false,
        public readonly bool $dangerousGoods = false,
        public readonly ?Sender $sender = null,
        public readonly ?float $priceExcl = null
    ) {
    }

    public function jsonSerialize(): mixed
    {
        return [
            "client" => $this->client,
            "sender" => $this->sender,
            "customer" => $this->customer,
            "shipment" => $this->shipment,
            "packages" => ["package" => $this->packages],
            "qoute" => ["product" => $this->products],
            "fragileGoods" => $this->fragileGoods,
            "dangerousGoods" => $this->dangerousGoods,
            "priceIncl" => $this->priceIncl,
            "priceExcl" => $this->priceExcl,
            "weight" => $this->weight,
        ];
    }

    public function hasIdentifier(): bool
    {
        return !(empty($this->shipment->id)
            && empty($this->shipment->reference)
            && empty($this->shipment->orderNumber));
    }
}
