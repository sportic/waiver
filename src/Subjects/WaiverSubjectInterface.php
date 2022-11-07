<?php

namespace Sportic\Waiver\Subjects;

use Sportic\Waiver\SubjectGroups\WaiverSubjectGroupInterface;

interface WaiverSubjectInterface
{
    public function isWaiverGroup(): bool;

    public function getWaiverGroup(): ?WaiverSubjectGroupInterface;

//    public function getWaivers();
}
