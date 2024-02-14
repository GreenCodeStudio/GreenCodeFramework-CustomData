<?php

namespace CustomData\Repository;

use Core\Database\DB;
use Exception;


class CustomDataSchemaRepository extends \Core\Repository
{

    public function __construct()
    {
        $this->archiveMode = static::ArchiveMode_OnlyExisting;
    }

    public function defaultTable(): string
    {
        return 'custom_data_table';
    }

    public function getDataTable($options)
    {
        $start = (int)$options->start;
        $limit = (int)$options->limit;
        $sqlOrder = $this->getOrderSQL($options);
        $rows = DB::get("SELECT * FROM custom_data_table $sqlOrder LIMIT $start,$limit");
        $total = DB::get("SELECT count(*) as count FROM custom_data_table")[0]->count;
        return ['rows' => $rows, 'total' => $total];
    }

    private function getOrderSQL($options)
    {
        if (empty($options->sort))
            return "";
        else {
            $mapping = ['name' => 'name', 'is_archived' => 'is_archived', 'created' => 'created', 'updated' => 'updated'];
            if (empty($mapping[$options->sort->col]))
                throw new Exception();
            return ' ORDER BY '.DB::safeKey($mapping[$options->sort->col]).' '.($options->sort->desc ? 'DESC' : 'ASC').' ';
        }
    }

    public function getAll()
    {
        if ($this->archiveMode == static::ArchiveMode_OnlyExisting)
            return DB::get("SELECT * FROM custom_data_table WHERE is_archived = 0");
        else
            return DB::get("SELECT * FROM custom_data_table");
    }

    public function getFullSchemaById(int $tableId)
    {
        $table = DB::get("SELECT * FROM custom_data_table WHERE id = ?", [$tableId])[0];
        if (empty($table))
            return null;
        $table->fields = DB::get("SELECT * FROM custom_data_field WHERE custom_data_table_id = ?", [$tableId]);
        return $table;
    }

    public function getSchemaByItemId(int $tableId)
    {
        $table = DB::get("
SELECT cdt.* 
FROM custom_data_table cdt
JOIN custom_data_item cdi ON cdi.custom_data_table_id = cdt.id
WHERE cdt.id = ?
", [$tableId])[0];
        if (empty($table))
            return null;
        $table->fields = DB::get("SELECT * FROM custom_data_field WHERE custom_data_table_id = ?", [$table->id]);
        return $table;
    }
}
