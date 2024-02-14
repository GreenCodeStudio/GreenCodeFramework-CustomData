<?php

namespace CustomData;

use CustomData\Repository\CustomDataRepository;
use CustomData\Repository\CustomDataSchemaRepository;
use MKrawczyk\FunQuery\FunQuery;

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
        $schema = (new CustomDataSchemaRepository())->getFullSchemaById($data->tableId);
        $values = FunQuery::create($schema->fields)
            ->map(function ($field) use ($data) {
                return ['custom_data_field_id' => $field->id, 'value' => $data->{'v_'.$field->id}];
            })
            ->toArray();
        $id = $this->defaultDB->insertRow($schema->id, $values);
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
