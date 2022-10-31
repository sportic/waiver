<?php

namespace Sportic\Waiver\Tests\Contents\Models;

use Sportic\Waiver\Contents\Models\WaiverContent;
use Sportic\Waiver\Tests\AbstractTest;

class WaiverContentTest extends AbstractTest
{
    public function test_empty_record()
    {
        $record = new WaiverContent();
        self::assertSame(null, $record->getBody());
        self::assertSame(null, $record->getVersion());
    }
}
