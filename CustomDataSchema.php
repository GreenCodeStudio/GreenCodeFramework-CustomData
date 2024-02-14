<?php

namespace CustomData;

use CustomData\Repository\CustomDataSchemaRepository;
use MKrawczyk\FunQuery\FunQuery;

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

    public function insert($data): int
    {
        $item['name'] = $data->name;
        $item['created'] = new \DateTime();
        $item['updated'] = new \DateTime();
        $fields=FunQuery::create($data->fields)->map(function($field){
            return [
                'name'=>$field->name,
                'type'=>$field->type,
                'created'=>new \DateTime(),
                'updated'=>new \DateTime(),
            ];
        })->toArray();
        $id = $this->defaultDB->insertTable($item, $fields);
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
