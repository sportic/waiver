<?php

namespace Sportic\Waiver\Subjects;

trait WaiverSubjectImplementation
{
    public function isWaiverGroup(): bool
    {
        return false;
    }

    public function getWaiverGroup(): mixed
    {
        return null;
    }
}