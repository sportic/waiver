<?php

namespace Sportic\Waiver\Signers\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasHash\RecordHasHash;
use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 * Trait WaiverPersonTrait
 */
trait WaiverSignerTrait
{
    use RecordHasId;
    use RecordHasHash;
    use TimestampableTrait;

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDob()
    {
        return $this->dob;
    }
}
