<?php

namespace Sportic\Waiver\Templates\Actions\Find;

use Sportic\Waiver\Base\Actions\Behaviours\HasDefaultReturn;
use Sportic\Waiver\Templates\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Templates\Models\WaiverTemplate;
use Sportic\Waiver\Templates\Models\WaiverTemplates;

/**
 * @property WaiverTemplates $repository
 */
class FindTemplateByParent
{
    use HasRepository;
    use HasDefaultReturn;

    protected string $parent;
    protected int $parent_id;

    public static function for(string $parent, int $parent_id): static
    {
        $instance = new static();
        $instance->parent = $parent;
        $instance->parent_id = $parent_id;
        return $instance;
    }

    public function fetch(): WaiverTemplate|null
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
            $data = $this->createTemplateData($data);
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
                ['parent = ?', $this->parent],
                ['parent_id = ?', $this->parent_id],
            ]
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    protected function createTemplateData(array $data = []): array
    {
        return array_merge($data, [
            'parent' => $this->parent,
            'parent_id' => $this->parent_id,
            'status' => 'active'
        ]);
    }
}