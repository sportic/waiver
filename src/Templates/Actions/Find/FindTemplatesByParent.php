<?php

namespace Sportic\Waiver\Templates\Actions\Find;

use Nip\Records\Collections\Collection;
use Nip\Records\Record;
use Sportic\Waiver\Base\Actions\Behaviours\HasDefaultReturn;
use Sportic\Waiver\Templates\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Templates\Models\WaiverTemplate;
use Sportic\Waiver\Templates\Models\WaiverTemplates;

/**
 * @property WaiverTemplates $repository
 */
class FindTemplatesByParent
{
    use HasRepository;
    use HasDefaultReturn;

    protected string $parent;
    protected int $parent_id;

    public static function for(string|Record $parent, int $parent_id = null): static
    {
        $instance = new static();
        if (is_object($parent)) {
            $parent_id = $parent->id;
            $parent = $parent->getManager()->getMorphName();
        }
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

    public function fetchAll(): Collection|null
    {
        $params = $this->findParams();
        $found = $this->repository->findByParams($params);
        if ($found->count() > 0) {
            return $found;
        }
        $default = $this->getDefault();
        if ($default instanceof WaiverTemplate) {
            $collection = $this->repository->getNewCollection();
            $collection->add($default);
            return $collection;
        }
        return null;
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