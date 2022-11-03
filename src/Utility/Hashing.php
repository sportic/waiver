<?php

namespace Sportic\Waiver\Utility;

class Hashing
{
    public const CRC32C = 'crc32c';

    public static function forArray(array $data): string
    {
        return self::forString(serialize($data));
    }
    public static function forString($data): string
    {
        return hash(static::CRC32C, $data);
    }
}