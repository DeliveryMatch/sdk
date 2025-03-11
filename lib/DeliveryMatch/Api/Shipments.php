<?php

declare(strict_types=1);

namespace DeliveryMatch\Api;

use DeliveryMatch\Api\Dto\Request\FindShipmentsRequest;
use DeliveryMatch\Api\Dto\Request\ShipmentRequest;
use DeliveryMatch\Exception\InvalidArgumentException;
use DeliveryMatch\HttpClient\Message\Json;
use DeliveryMatch\HttpClient\Message\ResponseMediator;

final class Shipments extends Endpoint
{
    public function insert(ShipmentRequest $request): array
    {
        if (!empty($request->shipment->id)) {
            throw new InvalidArgumentException("Shipment id must be empty when creating new shipments");
        }

        $response = $this->client->getHttpClient()->post("/insertShipment", body: Json::encode($request));
        return ResponseMediator::getContent($response);
    }

    public function update(ShipmentRequest $request): array
    {
        if (!$request->hasIdentifier()) {
            $message = "Shipment details are incomplete." .
                " Please provide at least one of the following: shipment ID, reference, or order number.";

            throw new InvalidArgumentException($message);
        }

        $response = $this->client->getHttpClient()->post("/updateShipment", body: Json::encode($request));
        return ResponseMediator::getContent($response);
    }

    public function getById(int $id): array
    {
        $request = [
            "shipment" => [
                "id" => $id
            ]
        ];

        $response = $this->client->getHttpClient()->post("/getShipment", body: Json::encode($request));
        return ResponseMediator::getContent($response);
    }

    public function getByOrderNumber(string $orderNumber): array
    {
        $request = [
            "shipment" => [
                "orderNumber" => $orderNumber
            ]
        ];

        $response = $this->client->getHttpClient()->post("/getShipment", body: Json::encode($request));
        return ResponseMediator::getContent($response);
    }

    public function findMultiple(FindShipmentsRequest $request): array
    {
        $response = $this->client->getHttpClient()->post("/getShipments", body: Json::encode($request));
        return ResponseMediator::getContent($response);
    }
}
