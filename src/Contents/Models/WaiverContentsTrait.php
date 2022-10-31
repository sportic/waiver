<?php

namespace Sportic\Waiver\Contents\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Bundle\Forms\Admin\Contents\BasicForm;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;

trait WaiverContentsTrait
{
    use HasTemplateRepositoryTrait;
    use TimestampableManagerTrait;

    protected function initRelationsWaiver(): void
    {
        $this->initRelationsWaiverTemplate();
    }

    /**
     * Get Form Class name by type
     *
     * @param string $type Type name
     *
     * @return string
     */
    public function getFormClassName($type = null)
    {
        if ($type == 'Admin/BasicForm') {
            return BasicForm::class;
        }

        return parent::getFormClassName($type);
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::CONTENTS, WaiverContents::TABLE);
    }
}
