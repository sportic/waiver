<?php

namespace Sportic\Waiver\Base\Models\Traits;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
use Nip\I18n\Translatable\HasTranslations;
use Nip\Records\Filters\Records\HasFiltersRecordsTrait;

/**
 * Trait CommonRecordsTrait
 * @package Sportic\Waiver\Models\AbstractModels
 */
trait CommonRecordsTrait
{
    use HasTranslations;
    use HasFormsRecordsTrait;
    use HasFiltersRecordsTrait;

    protected function initRelations(): void
    {
        parent::initRelations();
        $this->initRelationsWaiver();
    }

    /**
     * @return string
     */
    public function getTranslateRoot(): string
    {
        return $this->getController();
    }

    public function getRootNamespace(): string
    {
        return 'Sportic\Waiver\Models\\';
    }

    protected function generateController(): string
    {
        if (defined('static::CONTROLLER')) {
            return static::CONTROLLER;
        }

        return $this->getTable();
    }
}
