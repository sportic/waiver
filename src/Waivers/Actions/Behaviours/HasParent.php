<?php

namespace Sportic\Waiver\Waivers\Actions\Behaviours;

use Nip\Records\Record;

/**
 * @internal
 */
trait HasParent
{
    protected string $parent;
    protected int $parent_id;

    protected function populateParent(string|Record $parent, int $parent_id = null)
    {
        if (is_object($parent)) {
            $this->parent_id = $parent->id;
            $this->parent = $parent->getManager()->getMorphName();
            return $this;
        }

        $this->parent_id = $parent_id;
        $this->parent = $parent;

        return $this;
    }
}