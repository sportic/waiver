<?php

namespace Sportic\Waiver\Subjects;

use Sportic\Waiver\SubjectGroups\WaiverSubjectGroupInterface;

trait WaiverSubjectImplementation
{
    public function isWaiverGroup(): bool
    {
        return false;
    }

    public function getWaiverGroup(): ?WaiverSubjectGroupInterface
    {
        return null;
    }
}