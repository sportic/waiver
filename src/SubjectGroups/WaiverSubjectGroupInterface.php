<?php

namespace Sportic\Waiver\SubjectGroups;

use Sportic\Waiver\Subjects\WaiverSubjectInterface;

interface WaiverSubjectGroupInterface
{
    /**
     * @return ?WaiverSubjectInterface[]
     */
    public function getWaiverChilds();

    public function getWaivers();
}
