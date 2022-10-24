<?php

namespace Sportic\Waiver\Utility;

class Hashing
{
    public const CRC32C = 'crc32c';

    public static function forString($string): string
    {
        return hash(static::CRC32C, $string);
    }
}