<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\Api;

use DeliveryMatch\Sdk\Api\Dto\Request\FindShipmentsRequest;
use DeliveryMatch\Sdk\Api\Dto\Request\ShipmentRequest;
use DeliveryMatch\Sdk\Api\HttpClient\Message\Json;
use DeliveryMatch\Sdk\Exception\InvalidArgumentException;
use DeliveryMatch\Sdk\HttpClient\Message\ResponseMediator;
use Http\Client\Exception;
use JsonException;

final class Shipments extends Endpoint
{
    /**
     * @throws JsonException
     * @throws Exception
     */
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
