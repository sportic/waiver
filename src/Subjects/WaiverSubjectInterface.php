<?php

namespace Sportic\Waiver\Subjects;

interface WaiverSubjectInterface
{
    public function isWaiverGroup(): bool;

    public function getWaiverGroup(): mixed;

}
