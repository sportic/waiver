<?php

namespace Sportic\Waiver\Subjects;

use Sportic\Waiver\SubjectGroups\WaiverSubjectGroupInterface;

interface WaiverSubjectInterface
{
    public function isWaiverGroup(): bool;

    public function getWaiverGroup(): ?WaiverSubjectGroupInterface;

    public function getFirstName(): string;

    public function getLastName(): string;

    public function getEmail(): string;

    public function getDob(): string;
//    public function getWaivers();
}
