<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api;

use DeliveryMatch\Sdk\Api\Dto\Request\FindShipmentsRequest;
use DeliveryMatch\Sdk\Api\Dto\Request\ShipmentRequest;
use DeliveryMatch\Sdk\Exception\InvalidArgumentException;
use Http\Client\Exception;
use JsonException;

final class Shipments extends Endpoint
{
    /**
     * @throws Exception
     * @throws JsonException
     */
    public function insert(ShipmentRequest $request): array
    {
        if (!empty($request->shipment->id)) {
            throw new InvalidArgumentException("Shipment id must be empty when creating new shipments");
        }

        return $this->client->post("/insertShipment", body: $request);
    }

    /**
     * @throws Exception
     * @throws JsonException
     */
    public function update(ShipmentRequest $request): array
    {
        if (!$request->hasIdentifier()) {
            $message = "Shipment details are incomplete." .
                " Please provide at least one of the following: shipment ID, reference, or order number.";

            throw new InvalidArgumentException($message);
        }

        return $this->client->post("/updateShipment", body: $request);
    }

    /**
     * @throws Exception
     * @throws JsonException
     */
    public function getById(int $id): array
    {
        $request = [
            "shipment" => [
                "id" => $id
            ]
        ];

        return $this->client->post("/getShipment", body: $request);
    }

    /**
     * @throws Exception
     * @throws JsonException
     */
    public function getByOrderNumber(string $orderNumber): array
    {
        $request = [
            "shipment" => [
                "orderNumber" => $orderNumber
            ]
        ];

        return $this->client->post("/getShipment", body: $request);
    }

    /**
     * @throws Exception
     * @throws JsonException
     */
    public function findMultiple(FindShipmentsRequest $request): array
    {
        return $this->client->post("/getShipments", body: $request);
    }

    /**
     * @throws Exception
     * @throws JsonException
     */
    public function selectMethod(int $shipmentId, string $methodId): array
    {
        $request = [
            "shipment" => [
                "id" => $shipmentId
            ],
            "shipmentMethod" => [
                "id" => $methodId
            ]
        ];

        return $this->client->post("/updateShipmentMethod", body: $request);
    }
}
