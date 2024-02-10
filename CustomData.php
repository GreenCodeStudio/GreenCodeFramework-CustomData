<?php

namespace CustomData;

use CustomData\Repository\CustomDataRepository;

class CustomData extends \Core\BussinesLogic
{
    public function __construct()
    {
        $this->defaultDB = new CustomDataRepository();
    }

    public function getDataTable($options)
    {
        return $this->defaultDB->getDataTable($options);
    }

    public function update(int $id, $data)
    {
        $filtered = $this->filterData($data);
        $this->defaultDB->update($id, $filtered);
        \Core\WebSocket\Sender::sendToUsers(["CustomData", "CustomData", "Update", $id]);
    }

    protected function filterData($data)
    {
        $ret = [];
        $ret['custom_data_table_id'] = $data->custom_data_table_id;
        $ret['name'] = empty($data->name) ? null : $data->name;
        $ret['type'] = $data->type;
        $ret['type_params'] = empty($data->type_params) ? null : $data->type_params;
        $ret['updated'] = new \DateTime();;

        return $ret;
    }

    public function insert($data): int
    {
        $filtered = $this->filterData($data);
        $filtered['created'] = new \DateTime();
        $id = $this->defaultDB->insert($filtered);
        \Core\WebSocket\Sender::sendToUsers(["CustomData", "CustomData", "Insert", $id]);
        return $id;
    }

    public function getAll()
    {
        return $this->defaultDB->getAll();
    }

    public function getSelects()
    {
        return [];
    }

}
