<?php

namespace Sportic\Waiver\Waivers\Models\Filters;

use Nip\Database\Query\Select as SelectQuery;
use Nip\Records\Filters\Column\AbstractFilter;
use Nip\Records\Filters\Column\FilterInterface;

/**
 * Class ParentFilter
 * @package Sportic\Waiver\Waivers\Models\Filters
 */
class ParentFilter extends AbstractFilter implements FilterInterface
{
    public const PARAM_NAME = '_parent';
    public const PARAM_SEPARATOR = ':';

    protected $field = 'parent';

    public static function encodeValue($parent, $parent_id): string
    {
        return $parent . self::PARAM_SEPARATOR . $parent_id;
    }

    public function __construct()
    {
        $this->setRequestField(self::PARAM_NAME);
    }

    /**
     * @param SelectQuery $query
     */
    public function filterQuery($query)
    {
        list($parent, $parent_id) = $this->decodeValue();
        $query->where("`parent` = ?", $parent);
        $query->where("`parent_id` = ?", $parent_id);
    }

    /**
     * @return string[]
     */
    protected function decodeValue(): array
    {
        return explode(self::PARAM_SEPARATOR, $this->getValue());
    }
}
