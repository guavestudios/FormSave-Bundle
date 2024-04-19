<?php

declare(strict_types=1);

namespace Guave\FormSaveBundle\Model;

use Contao\ContentModel as BaseContentModel;

class ContentModel extends BaseContentModel
{
    /**
     * @param array<string> $options
     */
    public static function findPublishedByPidAndType(int $pid, string $type, array $options = []): BaseContentModel|null
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
