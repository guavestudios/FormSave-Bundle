<?php

namespace Guave\FormSaveBundle\Model;

use Contao\ContentModel as BaseContentModel;
use Contao\Model\Collection;

class ContentModel extends BaseContentModel
{
    /**
     * Find all published content elements by their parent ID and name
     *
     * @param int $pid The article ID
     * @param string $type The content element name
     * @param array $options An optional options array
     *
     * @return Collection|ContentModel[]|ContentModel|null A collection of models or null if there are no content elements
     */
    public static function findPublishedByPidAndType(int $pid, string $type, array $options = [])
    {
        $table = static::$strTable;
        $columns = ["$table.pid=? AND $table.type=? AND $table.ptable='tl_article'"];

        // Skip unsaved elements (see #2708)
        $columns[] = "$table.tstamp!=0";

        if (!isset($options['order'])) {
            $options['order'] = "$table.sorting";
        }

        return static::findOneBy($columns, [$pid, $type], $options);
    }
}
