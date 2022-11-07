<?php

namespace Sportic\Waiver\Base\Models\Behaviours\HasTemplate;

use Sportic\Waiver\Templates\Models\WaiverTemplate;

/**
 * @method WaiverTemplate getWaiverTemplate()
 */
trait HasTemplateRecordTrait
{
    protected ?int $template_id = null;

    /**
     * @return int|null
     */
    public function getTemplateId(): ?int
    {
        return $this->template_id;
    }

    /**
     * @param int|null $template_id
     */
    public function setTemplateId(?int $template_id): void
    {
        $this->template_id = $template_id;
    }
}
