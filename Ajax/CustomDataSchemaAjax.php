<?php

namespace CustomData\Ajax;

class CustomDataSchemaAjax extends \Core\AjaxController
{
    public function getTable($options)
    {
        $this->will('CustomDataSchema', 'show');
        $CustomDataSchema = new \CustomData\CustomDataSchema();
        return $CustomDataSchema->getDataTable($options);
    }

    public function update($data)
    {
        $this->will('CustomDataSchema', 'edit');
        $CustomDataSchema = new \CustomData\CustomDataSchema();
        $CustomDataSchema->update($data->id, $data);
    }

    public function updateMultiple(array $data)
    {
        $this->will('CustomDataSchema', 'edit');
        $CustomDataSchema = new \CustomData\CustomDataSchema();
        foreach ($data as $row) {
            $CustomDataSchema->update($row->id, $row->data);
        }
    }

    public function insert($data)
    {
        $this->will('CustomDataSchema', 'add');
        $CustomDataSchema = new \CustomData\CustomDataSchema();
        $id = $CustomDataSchema->insert($data);
    }
}
