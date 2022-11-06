<?php

namespace Sportic\Waiver\Subjects\Models;

use Nip\Records\Collections\Collection;
use Sportic\Waiver\SubjectGroups\WaiverSubjectGroupImplementation;
use Sportic\Waiver\Waivers\Models\Waiver;

/**
 * @method Waiver[]|Collection getWaivers()
 */
trait WaiverSubjectRecord
{
    use WaiverSubjectGroupImplementation;
}