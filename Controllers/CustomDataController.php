<?php

namespace CustomData\Controllers;

use Authorization\Permissions;
use Core\Exceptions\NotFoundException;

class CustomDataController extends \Common\PageStandardController
{

    function index(int $tableId)
    {
        $this->will('CustomData', 'show');
        $this->addView('CustomData', 'CustomDataList', ['tableId' => $tableId]);
        $this->pushBreadcrumb(['title' => 'CustomData', 'url' => '/CustomData']);

    }
    function index_data(int $tableId)
    {
        $this->will('CustomData', 'show');
        $CustomDataSchema = new \CustomData\CustomDataSchema();
        $schema = $CustomDataSchema->getSchemaByTableId($tableId);
        if ($schema == null)
            throw new NotFoundException();
        return ['schema' => $schema];
    }

    /**
     * @param int $id
     * @OfflineDataOnly
     */
    function edit(int $id)
    {
        $CustomDataSchema = new \CustomData\CustomDataSchema();
        $schema = $CustomDataSchema->getSchemaByItemId($id);
        $this->will('CustomData', 'edit');
        $this->addView('CustomData', 'CustomDataEdit', ['type' => 'edit', 'schema' => $schema]);
        $this->pushBreadcrumb(['title' => 'CustomData', 'url' => '/CustomData']);
        $this->pushBreadcrumb(['title' => 'Edycja', 'url' => '/CustomData/edit/'.$id]);
    }

    function edit_data(int $id)
    {
        $this->will('CustomData', 'edit');
        $CustomData = new \CustomData\CustomData();
        $data = $CustomData->getById($id);
        if ($data == null)
            throw new NotFoundException();
        return ['CustomData' => $data, 'selects' => $CustomData->getSelects()];
    }

    function add(int $tableId)
    {
        $CustomDataSchema = new \CustomData\CustomDataSchema();
        $schema = $CustomDataSchema->getSchemaByItemId($tableId);
        $this->will('CustomData', 'add');
        $this->addView('CustomData', 'CustomDataEdit', ['type' => 'add', 'schema' => $schema]);
        $this->pushBreadcrumb(['title' => 'CustomData', 'url' => '/CustomData']);
        $this->pushBreadcrumb(['title' => 'Dodaj', 'url' => '/CustomData/add']);
    }

    function add_data()
    {
        $this->will('CustomData', 'add');
        $CustomData = new \CustomData\CustomData();
        return ['selects' => $CustomData->getSelects()];
    }

    function show(int $id)
    {
        $this->will('CustomData', 'show');
        $CustomData = new \CustomData\CustomData();
        $data = $CustomData->getById($id);
        if ($data == null)
            throw new NotFoundException();

        $this->addView('CustomData', 'CustomDataShow', ['item' => $data]);
        $this->pushBreadcrumb(['title' => 'CustomData', 'url' => '/CustomData']);
        $this->pushBreadcrumb(['title' => 'Szczegóły', 'url' => '/CustomData/show/'.$id]);
    }
}
