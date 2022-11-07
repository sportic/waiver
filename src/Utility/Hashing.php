<?php

namespace Sportic\Waiver\Utility;

class Hashing
{
    public const CRC32C = 'crc32c';
    public const MD4 = 'md4';

    public static function forArray(array $data): string
    {
        return self::forString(serialize($data));
    }

    public static function forString($data, $algo = null): string
    {
        $algo = $algo ?: self::CRC32C;
        return hash($algo, $data);
    }

    public static function secretToken($data): string
    {
        $data = is_string($data) ? $data : serialize($data);
        return static::forString($data, self::MD4);
    }
}