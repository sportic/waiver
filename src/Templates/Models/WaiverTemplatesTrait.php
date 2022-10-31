<?php

namespace Sportic\Waiver\Templates\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;

/**
 * @method WaiverTemplate findOneByParams($params = [])
 */
trait WaiverTemplatesTrait
{
    use HasParentRepositoryTrait;
    use TimestampableManagerTrait;

    protected function initRelationsWaiver(): void
    {
        $this->initRelationsWaiverParentRecord();
        $this->initRelationsWaiverContentLast();
    }

    protected function initRelationsWaiverContentLast(): void
    {
        $this->belongsTo(
            WaiverTemplates::RELATION_CONTENT_LAST,
            ['fk' => 'content_last_id', 'with' => WaiverModels::contents()]
        );
    }

    public function generatePrimaryFK()
    {
        return 'template_id';
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::TEMPLATES, WaiverTemplates::TABLE);
    }
}
