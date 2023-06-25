<?php

namespace Vishalshakya;

use JsonException;

class JsonHandler
{
    public static function encode($data)
    {
        if (!is_array($data) && !is_object($data)) {
            throw new \InvalidArgumentException('Invalid data type. Only arrays and objects can be encoded to JSON.');
        }

        return json_encode($data);
    }

    /**
     * @throws JsonException
     */
    public static function decode($jsonString, $assoc = false)
    {
        if (!is_string($jsonString)) {
            throw new \InvalidArgumentException('Invalid JSON string. Only valid JSON strings can be decoded.');
        }

        $decodedData = json_decode($jsonString, $assoc, 512, JSON_THROW_ON_ERROR);

        if ($assoc && !is_array($decodedData)) {
            throw new \InvalidArgumentException('Invalid JSON string. Decoded data is not an associative array.');
        }

        return $decodedData;
    }
}
