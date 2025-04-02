<?php

declare(strict_types=1);

namespace DeliveryMatch\Sdk\HttpClient\Message;

use JsonException;

final class Json
{
    /**
     * Encodes data into JSON.
     *
     * @param mixed $data The data to encode (array or object).
     * @param int $options JSON encoding options (e.g., JSON_PRETTY_PRINT).
     * @param int<1, max> $depth Maximum depth for encoding.
     * @return string The JSON-encoded string.
     * @throws JsonException
     */
    public static function encode($data, int $options = 0, int $depth = 512): string
    {
        return json_encode($data, JSON_THROW_ON_ERROR | $options, $depth);
    }

    /**
     * Decodes a JSON string into a PHP array or object.
     *
     * @param string $json The JSON string to decode.
     * @param int<1, max> $depth Maximum depth for decoding.
     * @param int $flags Decoding options.
     * @return array The decoded data.
     * @throws JsonException
     */
    public static function decode(string $json, int $depth = 512, int $flags = 0): array
    {
        return json_decode($json, true, $depth, JSON_THROW_ON_ERROR | $flags);
    }
}
