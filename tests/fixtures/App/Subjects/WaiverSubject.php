<?php

namespace Sportic\Waiver\Tests\Fixtures\App\Subjects;

use Sportic\Waiver\Subjects\WaiverSubjectImplementation;
use Sportic\Waiver\Subjects\WaiverSubjectInterface;

class WaiverSubject implements WaiverSubjectInterface
{
    use WaiverSubjectImplementation;
}