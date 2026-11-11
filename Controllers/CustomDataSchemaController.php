<?php

namespace CustomData\Controllers;

use Authorization\Permissions;
use Core\Exceptions\NotFoundException;

class CustomDataSchemaController extends \Common\PageStandardController
{

    function index()
    {
        $this->will('CustomDataSchema', 'show');
        $this->addView('CustomData', 'CustomDataSchemaList');
        $this->pushBreadcrumb(['title' => t('CustomData.menu'), 'url' => '/CustomDataSchema']);

    }

    /**
     * @param int $id
     * @OfflineDataOnly
     */
    function edit(int $id)
    {
        $this->will('CustomDataSchema', 'edit');
        $this->addView('CustomData', 'CustomDataSchemaEdit', ['type' => 'edit']);
        $this->pushBreadcrumb(['title' => t('CustomData.menu'), 'url' => '/CustomDataSchema']);
        $this->pushBreadcrumb(['title' => t('CommonBase.breadcrumb.edit'), 'url' => '/CustomDataSchema/edit/'.$id]);
    }

    function edit_data(int $id)
    {
        $this->will('CustomDataSchema', 'edit');
        $CustomDataSchema = new \CustomData\CustomDataSchema();
        $data = $CustomDataSchema->getById($id);
        if ($data == null)
            throw new NotFoundException();
        return ['CustomDataSchema' => $data];
    }

    /**
     * @OfflineConstant
     */
    function add()
    {
        $this->will('CustomDataSchema', 'add');
        $this->addView('CustomData', 'CustomDataSchemaEdit', ['type' => 'add']);
        $this->pushBreadcrumb(['title' => t('CustomData.menu'), 'url' => '/CustomDataSchema']);
        $this->pushBreadcrumb(['title' => t('CommonBase.breadcrumb.add'), 'url' => '/CustomDataSchema/add']);
    }


    /**
     * @param int $id
     */
    function show(int $id)
    {
        $this->will('CustomDataSchema', 'show');
        $CustomDataSchema = new \CustomData\CustomDataSchema();
        $data = $CustomDataSchema->getById($id);
        if ($data == null)
            throw new NotFoundException();

        $this->addView('CustomData', 'CustomDataSchemaShow', ['item' => $data]);
        $this->pushBreadcrumb(['title' => t('CustomData.menu'), 'url' => '/CustomDataSchema']);
        $this->pushBreadcrumb(['title' => t('CommonBase.breadcrumb.show'), 'url' => '/CustomDataSchema/show/'.$id]);
    }
}
