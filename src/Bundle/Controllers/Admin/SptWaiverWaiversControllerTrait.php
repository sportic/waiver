<?php

namespace Sportic\Waiver\Bundle\Controllers\Admin;

use Nip\Records\Collections\Collection;
use Nip\Records\Record;
use Sportic\Waiver\Templates\Actions\Find\FindTemplatesByParent;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Waivers\Actions\FindOrCreateWaiver;
use Sportic\Waiver\Waivers\Models\Filters\TemplateFilter;
use Sportic\Waiver\Waivers\Models\Waiver;

trait SptWaiverWaiversControllerTrait
{
    use AbstractControllerTrait;
    use \ByTIC\Controllers\Behaviors\CrudModels;

    public function indexForTemplateParent(Record $parent)
    {
        $templates = $this->getRequest()->get(TemplateFilter::PARAM_NAME);
        if ($templates === null) {
            $templates = FindTemplatesByParent::for($parent)->fetchAll();

            $this->getRequest()->attributes->set(
                TemplateFilter::PARAM_NAME,
                TemplateFilter::encodeValue($templates)
            );
        }
        $this->doModelsListing();
    }

    public function indexForParent($parent, $parent_id)
    {
        $this->getRequest()->attributes->set(
            TemplateFilter::PARAM_NAME,
            TemplateFilter::encodeValue($parent, $parent_id)
        );
        $this->doModelsListing();
    }

    public function createForSubject(): void
    {
        $subject = $this->checkForeignModelFromRequest(
            $this->getRequest()->get('parent_type'),
            'parent_id'
        );

        //SAVE WAIVER
        $waiver = FindOrCreateWaiver::forSubject($subject)
            ->orCreate()
            ->fetch();

        $redirect = $this->getRequest()->server->get('HTTP_REFERER');
        $this->flashRedirect(
            $this->getModelManager()->getMessage('created'),
            $redirect,
            'success'
            );
    }

    /**
     * @param Collection $items
     */
    protected function indexPrepareItems($items)
    {
        parent::indexPrepareItems($items);
        $items->loadRelation('WaiverConsents');
    }

    protected function generateModelName()
    {
        return get_class(WaiverModels::waivers());
    }

    /**
     * @param Waiver $item
     */
    protected function checkItemAccess($item)
    {
        parent:: checkItemAccess($item);

        $this->checkWaiverParentRecordAccess($item->getParentRecord());

        $template = $item->getWaiverTemplate();
        $this->checkAndSetForeignModelInRequest($template);

        $record = $template->getParentRecord();
        $this->checkWaiverParentRecordAccess($record);
    }

    /**
     * @param Record $record
     * @return void
     */
    protected function checkWaiverParentRecordAccess($record)
    {
        $this->checkAndSetForeignModelInRequest($record);
    }

}