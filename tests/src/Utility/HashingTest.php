<?php

namespace Sportic\Waiver\Tests\Utility;

use Sportic\Waiver\Tests\AbstractTest;
use Sportic\Waiver\Utility\Hashing;

class HashingTest extends AbstractTest
{
    /**
     * @dataProvider data_forString
     * @param $string
     * @param $expected
     * @return void
     */
    public function test_forArray(): void
    {
        self::assertSame(
            'e9696fd3',
            Hashing::forArray(['a' => 'b'])
        );
    }

    /**
     * @dataProvider data_forString
     * @param $string
     * @param $expected
     * @return void
     */
    public function test_forString($string, $expected): void
    {
        self::assertSame($expected, Hashing::forString($string));
    }

    public function data_forString(): array
    {
        return [
            ['', '00000000'],
            ['123', '107b2fb2'],
            ['asd', 'cee632aa'],
            [file_get_contents(TEST_FIXTURE_PATH . '/waiver_texts/default.html'), '5e9efbec'],
        ];
    }
}
