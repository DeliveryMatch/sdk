<?php

declare(strict_types=1);

namespace DeliveryMatch\HttpClient\Message;

use DeliveryMatch\Exception\InvalidArgumentException;
use DeliveryMatch\Exception\RuntimeException;

final class Json
{
    /**
     * Encodes data into JSON.
     *
     * @param object|array $data The data to encode (array or object).
     * @param int $options JSON encoding options (e.g., JSON_PRETTY_PRINT).
     * @param int<1, max> $depth Maximum depth for encoding.
     * @return string The JSON-encoded string.
     * @throws InvalidArgumentException If the data is not encodable.
     */
    public static function encode(object|array $data, int $options = 0, int $depth = 512): string
    {
        $json = json_encode($data, $options, $depth);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidArgumentException("JSON encode error: " . json_last_error_msg());
        }

        if ($json === false) {
            throw new RuntimeException("Could not correctly encode json");
        }

        return $json;
    }

    /**
     * Decodes a JSON string into a PHP array or object.
     *
     * @param string $json The JSON string to decode.
     * @param int<1, max> $depth Maximum depth for decoding.
     * @param int $flags Decoding options.
     * @return array The decoded data.
     * @throws InvalidArgumentException If the JSON string is invalid.
     */
    public static function decode(string $json, int $depth = 512, int $flags = 0): array
    {
        $data = json_decode($json, true, $depth, $flags);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidArgumentException("JSON decode error: " . json_last_error_msg());
        }

        return $data;
    }
}
