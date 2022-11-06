<?php

namespace Sportic\Waiver\Tests\Utility;

use Sportic\Waiver\Utility\WaiverPaths;
use PHPUnit\Framework\TestCase;

class WaiverPathsTest extends TestCase
{
    public function test_resources()
    {
        self::assertEquals(
            PROJECT_BASE_PATH.  '/Bundle/resources',
            WaiverPaths::resources()
        );
    }
}
