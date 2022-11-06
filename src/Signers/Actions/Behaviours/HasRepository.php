<?php

namespace Sportic\Waiver\Signers\Actions\Behaviours;

use Nip\Records\AbstractModels\RecordManager;
use Sportic\Waiver\Signers\Models\WaiverSigners;
use Sportic\Waiver\Utility\WaiverModels;

trait HasRepository
{
    use \Sportic\Waiver\Base\Actions\Behaviours\HasRepository;

    protected function generateRepository(): WaiverSigners|RecordManager
    {
        return WaiverModels::signers();
    }
}