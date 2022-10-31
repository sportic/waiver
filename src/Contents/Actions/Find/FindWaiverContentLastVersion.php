<?php

namespace Sportic\Waiver\Contents\Actions\Find;

use Sportic\Waiver\Base\Actions\Behaviours\HasDefaultReturn;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRepositoryInterface;
use Sportic\Waiver\Contents\Models\WaiverContent;
use Sportic\Waiver\Contents\Models\WaiverContents;
use Sportic\Waiver\Contents\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Templates\Models\WaiverTemplate;

/**
 * @property WaiverContents $repository
 */
class FindWaiverContentLastVersion
{
    use HasRepository;

    protected WaiverTemplate $template;

    public static function for(WaiverTemplate $template): static
    {
        $instance = new static();
        $instance->template = $template;
        return $instance;
    }

    public function fetch(): WaiverContent|null
    {
        return $this->repository->findOneByParams([
            'where' => [
                ['template_id = ?', $this->template->id],
            ],
            'order' => ['version', 'desc']
        ]);
    }

}