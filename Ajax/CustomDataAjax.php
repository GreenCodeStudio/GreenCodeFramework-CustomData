<?php

namespace CustomData\Ajax;

class CustomDataAjax extends \Core\AjaxController
{
    public function getTable($options)
    {
        $this->will('CustomData', 'show');
        $CustomData = new \CustomData\CustomData();
        return $CustomData->getDataTable($options);
    }

    public function update($data)
    {
        $this->will('CustomData', 'edit');
        $CustomData = new \CustomData\CustomData();
        $CustomData->update($data->id, $data);
    }

    public function updateMultiple(array $data)
    {
        $this->will('CustomData', 'edit');
        $CustomData = new \CustomData\CustomData();
        foreach ($data as $row) {
            $CustomData->update($row->id, $row->data);
        }
    }

    public function insert($data)
    {
        $this->will('CustomData', 'add');
        $CustomData = new \CustomData\CustomData();
        $id = $CustomData->insert($data);
    }
}
