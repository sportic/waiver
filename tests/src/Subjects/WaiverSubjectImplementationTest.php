<?php

namespace Sportic\Waiver\Tests\Subjects;

use PHPUnit\Framework\TestCase;
use Sportic\Waiver\Tests\Fixtures\App\Subjects\WaiverSubject;

class WaiverSubjectImplementationTest extends TestCase
{
    public function test_isWaiverGroup()
    {
        $subject = new WaiverSubject();
        self::assertFalse($subject->isWaiverGroup());
    }
}
