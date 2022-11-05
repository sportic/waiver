<?php

namespace Sportic\Waiver\Waivers\Actions;

use Nip\Records\Record;

class FindAllForParent
{
    use Behaviours\HasRepository;
    use Behaviours\HasParent;

    protected string $parent;
    protected int $parent_id;


    public static function forParent(string|Record $parent, int $parent_id = null): static
    {
        $self = new self();
        $self->populateParent($parent, $parent_id);
        return $self;
    }

    public function findAll(): \Nip\Records\Collections\Collection
    {
        $query = $this->repository->paramsToQuery();

        $query->where('parent_id = ?', $this->parent_id);
        $query->where('parent = ?', $this->parent);
        return $this->repository->findByQuery($query);
    }
}