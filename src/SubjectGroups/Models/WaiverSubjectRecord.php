<?php

namespace Sportic\Waiver\SubjectGroups\Models;

use Nip\Collections\Collection;
use Sportic\Waiver\SubjectGroups\WaiverSubjectGroupImplementation;

/**
 */
trait WaiverSubjectRecord
{
    use WaiverSubjectGroupImplementation;

    public function getWaivers()
    {
        $children = $this->getWaiverChilds();
        $children = $children ? $children : [];
        $collection = new Collection();
        foreach ($children as $child) {
            $waivers = $child->getWaivers();
            $collection->push(...$waivers);
        }
        return $collection;
    }
}