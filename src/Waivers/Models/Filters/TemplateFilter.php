<?php

namespace Sportic\Waiver\Waivers\Models\Filters;

use Nip\Collections\Collection;
use Nip\Database\Query\Select as SelectQuery;
use Nip\Records\Filters\Column\AbstractFilter;
use Nip\Records\Filters\Column\FilterInterface;
use Nip\Utility\Arr;

/**
 * Class ParentFilter
 * @package Sportic\Waiver\Waivers\Models\Filters
 */
class TemplateFilter extends AbstractFilter implements FilterInterface
{
    public const PARAM_NAME = '_template';
    public const PARAM_SEPARATOR = ',';

    protected $field = 'template';

    public static function encodeValue($templates): string
    {
        if (is_string($templates)) {
            return $templates;
        }

        $templateIds = [];
        if ($templates instanceof Collection) {
            $templatesIds = $templates->pluck('id')->toArray();
        } elseif (is_array($templates)) {
            $templatesIds = $templates;
        } else {
            throw new \Exception('Invalid template type');
        }
        return implode(self::PARAM_SEPARATOR, $templatesIds);
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
        $template_id = $this->decodeValue();
        $query->where("`template_id` IN ? ", $template_id);
    }

    /**
     * @return string[]
     */
    protected function decodeValue(): array
    {
        $values = explode(self::PARAM_SEPARATOR, $this->getValue());
        return array_filter($values, function ($value) {
            $intVal = (int) $value;
            return $value == $intVal;
        });
    }
}
