<?php

namespace Sportic\Waiver\Waivers\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Utility\PackageConfig;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Waivers\Models\Filters\FilterManager;

trait WaiversTrait
{
    use HasParentRepositoryTrait;
    use HasTemplateRepositoryTrait;
    use TimestampableManagerTrait;

    protected function initRelationsWaiver(): void
    {
        $this->initRelationsWaiverParentRecord();
        $this->initRelationsWaiverTemplate();
        $this->initRelationsWaiverConsents();
    }

    public function generatePrimaryFK()
    {
        return 'waiver_id';
    }

    protected function initRelationsWaiverConsents(): void
    {
        $this->hasMany(
            'WaiverConsents',
            ['class' => get_class(WaiverModels::consents()), 'fk' => 'waiver_id']
        );
    }

    /** @noinspection PhpMissingParentCallCommonInspection
     * @return string
     */
    protected function generateFilterManagerClass()
    {
        return FilterManager::class;
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::WAIVERS, Waivers::TABLE);
    }
}
