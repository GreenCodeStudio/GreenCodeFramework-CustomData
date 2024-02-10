<?php

namespace CustomData\Repository;

use Core\Database\DB;
use Exception;


class CustomDataRepository extends \Core\Repository
{

    public function __construct()
    {
        $this->archiveMode = static::ArchiveMode_OnlyExisting;
    }

    public function defaultTable(): string
    {
        return 'custom_data_item';
    }

    public function getDataTable($options)
    {
        $start = (int)$options->start;
        $limit = (int)$options->limit;
        $sqlOrder = $this->getOrderSQL($options);
        $rows = DB::get("SELECT * FROM custom_data_item $sqlOrder LIMIT $start,$limit");
        $total = DB::get("SELECT count(*) as count FROM custom_data_item")[0]->count;
        return ['rows' => $rows, 'total' => $total];
    }

    private function getOrderSQL($options)
    {
        if (empty($options->sort))
            return "";
        else {
            $mapping = ['custom_data_table_id' => 'custom_data_table_id', 'name' => 'name', 'type' => 'type', 'type_params' => 'type_params', 'created' => 'created', 'updated' => 'updated'];
            if (empty($mapping[$options->sort->col]))
                throw new Exception();
            return ' ORDER BY '.DB::safeKey($mapping[$options->sort->col]).' '.($options->sort->desc ? 'DESC' : 'ASC').' ';
        }
    }

    public function getAll()
    {
        if ($this->archiveMode == static::ArchiveMode_OnlyExisting)
            return DB::get("SELECT * FROM custom_data_item WHERE is_archived = 0");
        else
            return DB::get("SELECT * FROM custom_data_item");
    }
}
