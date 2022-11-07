<?php

namespace Sportic\Waiver\Waivers\Models;

use Nip\Utility\Str;
use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Bundle\Forms\Admin\Contents\BasicForm;
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

    /**
     * Get Form Class name by type
     *
     * @param string $type Type name
     *
     * @return string
     */
    public function getFormClassName($type = null)
    {
        if (strpos($type, 'Waiver::') === 0) {
            $type = str_replace('Waiver::', '\Sportic\Waiver\Bundle\Forms\\', $type);
            $type = str_replace('\Admin\\', '\Admin\\Waivers\\', $type);
            $type = str_replace('\Frontend\\', '\Frontend\\Waivers\\', $type);
            return $type;
        }

        return parent::getFormClassName($type);
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
