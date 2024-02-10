<?php

namespace CustomData;

use CustomData\Repository\CustomDataSchemaRepository;

class CustomDataSchema extends \Core\BussinesLogic
{
    public function __construct()
    {
        $this->defaultDB = new CustomDataSchemaRepository();
    }

    public function getDataTable($options)
    {
        return $this->defaultDB->getDataTable($options);
    }

    public function update(int $id, $data)
    {
        $filtered = $this->filterData($data);
        $this->defaultDB->update($id, $filtered);
        \Core\WebSocket\Sender::sendToUsers(["CustomData", "CustomDataSchema", "Update", $id]);
    }

    protected function filterData($data)
    {
        $ret = [];
        $ret['name'] = empty($data->name) ? null : $data->name;
        $ret['updated'] = new \DateTime();;

        return $ret;
    }

    public function insert($data): int
    {
        $filtered = $this->filterData($data);
        $filtered['created'] = new \DateTime();
        $id = $this->defaultDB->insert($filtered);
        \Core\WebSocket\Sender::sendToUsers(["CustomData", "CustomDataSchema", "Insert", $id]);
        return $id;
    }

    public function getAll()
    {
        return $this->defaultDB->getAll();
    }

    public function getSchemaByTableId(int $tableId)
    {
       return (new CustomDataSchemaRepository())->getFullSchemaById($tableId);
    }

    public function getSchemaByItemId(int $id)
    {
        return (new CustomDataSchemaRepository())->getSchemaByItemId($id);
    }


}
