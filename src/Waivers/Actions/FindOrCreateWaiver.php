<?php

namespace Sportic\Waiver\Waivers\Actions;

use Nip\Records\Record;
use Sportic\Waiver\Base\Actions\Behaviours\HasDefaultReturn;
use Sportic\Waiver\Templates\Models\WaiverTemplate;
use Sportic\Waiver\Waivers\Models\Waiver;

class FindOrCreateWaiver
{
    use Behaviours\HasRepository;
    use Behaviours\HasParent;
    use HasDefaultReturn;

    protected WaiverTemplate $template;


    public static function for(WaiverTemplate $template, string|Record $parent, int $parent_id = null): static
    {
        $instance = new static();
        $instance->template = $template;

        $instance->populateParent($parent, $parent_id);

        return $instance;
    }

    public function fetch(): Waiver|null
    {
        $params = $this->findParams();
        $found = $this->repository->findOneByParams($params);
        return $found ?: $this->getDefault();
    }


    /**
     * @param array $data
     * @return $this
     */
    public function orCreate(array $data = []): self
    {
        $this->orReturn(function () use ($data) {
            $data = $this->createRecordData($data);
            $record = $this->repository->getNewRecord($data);
            $record->saveRecord();
            return $record;
        });

        return $this;
    }

    /**
     * @return array
     */
    protected function findParams(): array
    {
        return [
            'where' => [
                ['template_id = ?' => $this->template->id],
                ['parent = ?', $this->parent],
                ['parent_id = ?', $this->parent_id],
            ]
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    protected function createRecordData(array $data = []): array
    {
        return array_merge($data, [
            'template_id' => $this->template->id,
            'parent' => $this->parent,
            'parent_id' => $this->parent_id,
        ]);
    }
}
