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
        $selects = ['cdi.id'];
        $schema = (new CustomDataSchemaRepository())->getFullSchemaById($options->params->tableId);
        foreach ($schema->fields as $field) {
            $selects[] = "MAX(CASE WHEN custom_data_field_id = $field->id THEN cdv.value END) as v_$field->id";
        }
        $rows = DB::get("
        SELECT ".implode(', ', $selects)." 
        FROM custom_data_item cdi 
        LEFT JOIN custom_data_value cdv ON cdv.custom_data_item_id=cdi.id 
        WHERE custom_data_table_id = ? 
        GROUP BY cdi.id 
        $sqlOrder 
        LIMIT $start,$limit", [$options->params->tableId]);
        $total = DB::get("SELECT count(*) as count FROM custom_data_item WHERE custom_data_table_id = ?", [$options->params->tableId])[0]->count;
        return ['rows' => $rows, 'total' => $total];
    }

    private function getOrderSQL($options)
    {
        if (empty($options->sort)) {
            return "";
        } else {
            if (preg_match('/^v_([0-9]+)$/', $options->sort->col, $matches)) {
                return ' ORDER BY '.DB::safeKey($matches[0]).' '.($options->sort->desc ? 'DESC' : 'ASC').' ';
            }
        }
    }

    public function getAll()
    {
        if ($this->archiveMode == static::ArchiveMode_OnlyExisting)
            return DB::get("SELECT * FROM custom_data_item WHERE is_archived = 0");
        else
            return DB::get("SELECT * FROM custom_data_item");
    }

    public function getById(int $id)
    {
        $item = DB::get("SELECT * FROM custom_data_item WHERE id = ?", [$id])[0];
        foreach (DB::get("SELECT * FROM custom_data_value WHERE custom_data_item_id = ?", [$id]) as $value) {
            $key = ('v_'.$value->custom_data_field_id);
            $item->$key = $value->value;
        }
        return $item;
    }

    public function insertRow($id, array $values)
    {
        DB::beginTransaction();
        $id = DB::insert('custom_data_item', ['custom_data_table_id' => $id, 'created' => new \DateTime(), 'updated' => new \DateTime()]);
        foreach ($values as $value) {
            $value['custom_data_item_id'] = $id;
            $value['created'] = new \DateTime();
            $value['updated'] = new \DateTime();
            DB::insert('custom_data_value', $value);
        }
        DB::commit();
        return $id;
    }
}
