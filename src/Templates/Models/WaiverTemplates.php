<?php

namespace Sportic\Waiver\Templates\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class WaiverTemplates
 * @package Sportic\Waiver\Templates\Models
 */
class WaiverTemplates extends RecordManager
{
    use WaiverTemplatesTrait;
    use CommonRecordsTrait;

    public const TABLE = 'spt_waiver_templates';
    public const CONTROLLER = 'spt_waiver_templates';
}
