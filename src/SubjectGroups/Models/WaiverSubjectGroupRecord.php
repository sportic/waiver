<?php

namespace Sportic\Waiver\SubjectGroups\Models;

use Nip\Collections\Collection;
use Sportic\Waiver\SubjectGroups\WaiverSubjectGroupImplementation;

/**
 */
trait WaiverSubjectGroupRecord
{
    use WaiverSubjectGroupImplementation;

    public function getWaivers()
    {
        $children = $this->getWaiverChilds();
        $children = $children ? $children : [];
        $collection = new Collection();
        foreach ($children as $child) {
            $waivers = $child->getWaivers();
            if ($waivers instanceof Collection) {
                $collection->push(...$waivers->all());
            }
        }
        return $collection;
    }
}