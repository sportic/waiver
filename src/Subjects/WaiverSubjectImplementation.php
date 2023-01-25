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

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getDob(): ?string
    {
        return $this->dob;
    }
}