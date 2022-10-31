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
class FindWaiverContentLastByTemplate
{
    use HasRepository;
    use HasDefaultReturn;

    protected WaiverTemplate $template;

    public static function for(WaiverTemplate $template): static
    {
        $instance = new static();
        $instance->template = $template;
        return $instance;
    }

    public function fetch(): WaiverContent|null
    {
        $found = $this->template->getContentLast();
        return $found ?: $this->getDefault();
    }

    /**
     * @param array $data
     * @return $this
     */
    public function orEmpty(array $data = []): self
    {
        $this->orReturn(function () use ($data) {
            $data = $this->createTemplateData($data);
            $record = $this->repository->getNewRecord($data);
            $record->getRelation(HasTemplateRepositoryInterface::RELATION_WAIVER_TEMPLATE)->setResults($this->template);
            return $record;
        });

        return $this;
    }

    /**
     * @param array $data
     * @return array
     */
    protected function createTemplateData(array $data = []): array
    {
        return array_merge($data, []);
    }
}