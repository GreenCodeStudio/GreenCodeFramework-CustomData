<?php

namespace CustomData\Api;

class CustomDataApi extends \Core\ApiController
{
    /**
     * @ApiEndpoint(
     *   'type' => 'get',
     *   'url' => 'CustomData',
     *   'tags' =>
     *   array (
     *     0 => 'CustomData-CustomData',
     *   ),
     *   'description' => 'Get list of CustomData',
     *   'responses' =>
     *   array (
     *     200 =>
     *     array (
     *       'content' =>
     *       array (
     *         'application/json' =>
     *         array (
     *           'schema' =>
     *           array (
     *             'type' => 'array',
     *             'items' =>
     *             array (
     *               'type' => 'object',
     *               'properties' =>
     *               array (
     *                 'id' =>
     *                 array (
     *                   'type' => 'int',
     *                   'format' => NULL,
     *                 ),
     *                 'custom_data_table_id' =>
     *                 array (
     *                   'type' => 'int',
     *                   'format' => NULL,
     *                 ),
     *                 'name' =>
     *                 array (
     *                   'type' => 'text',
     *                   'format' => NULL,
     *                 ),
     *                 'type' =>
     *                 array (
     *                   'type' => 'varchar(32)',
     *                   'format' => NULL,
     *                 ),
     *                 'type_params' =>
     *                 array (
     *                   'type' => 'json',
     *                   'format' => NULL,
     *                 ),
     *                 'created' =>
     *                 array (
     *                   'type' => 'datetime',
     *                   'format' => 'date-time',
     *                 ),
     *                 'updated' =>
     *                 array (
     *                   'type' => 'datetime',
     *                   'format' => 'date-time',
     *                 ),
     *               ),
     *             ),
     *           ),
     *         ),
     *       ),
     *     ),
     *   ),
     * )
     **/
    public function getList()
    {
        $this->will('CustomData', 'show');
        $CustomData = new \CustomData\CustomData();
        return $CustomData->getAll();
    }

    /**
     * @ApiEndpoint(
     *   'type' => 'get',
     *   'url' => 'CustomData/{id}',
     *   'tags' =>
     *   array (
     *     0 => 'CustomData-CustomData',
     *   ),
     *   'description' => 'Get one CustomData',
     *   'parameters' =>
     *   array (
     *     0 =>
     *     array (
     *       'name' => 'id',
     *       'in' => 'path',
     *       'required' => true,
     *     ),
     *   ),
     *   'responses' =>
     *   array (
     *     200 =>
     *     array (
     *       'content' =>
     *       array (
     *         'application/json' =>
     *         array (
     *           'schema' =>
     *           array (
     *             'type' => 'object',
     *             'properties' =>
     *             array (
     *               'id' =>
     *               array (
     *                 'type' => 'int',
     *                 'format' => NULL,
     *               ),
     *               'custom_data_table_id' =>
     *               array (
     *                 'type' => 'int',
     *                 'format' => NULL,
     *               ),
     *               'name' =>
     *               array (
     *                 'type' => 'text',
     *                 'format' => NULL,
     *               ),
     *               'type' =>
     *               array (
     *                 'type' => 'varchar(32)',
     *                 'format' => NULL,
     *               ),
     *               'type_params' =>
     *               array (
     *                 'type' => 'json',
     *                 'format' => NULL,
     *               ),
     *               'created' =>
     *               array (
     *                 'type' => 'datetime',
     *                 'format' => 'date-time',
     *               ),
     *               'updated' =>
     *               array (
     *                 'type' => 'datetime',
     *                 'format' => 'date-time',
     *               ),
     *             ),
     *           ),
     *         ),
     *       ),
     *     ),
     *   ),
     * )
     **/
    public function getOneById(int $id)
    {
        $this->will('CustomData', 'show');
        $CustomData = new \CustomData\CustomData();
        return $CustomData->getById($id);
    }

    /**
     * @ApiEndpoint(
     *   'type' => 'post',
     *   'url' => 'CustomData',
     *   'tags' =>
     *   array (
     *     0 => 'CustomData-CustomData',
     *   ),
     *   'description' => 'Insert one CustomData',
     *   'requestBody' =>
     *   array (
     *     'content' =>
     *     array (
     *       'application/json' =>
     *       array (
     *         'schema' =>
     *         array (
     *           'type' => 'object',
     *           'properties' =>
     *           array (
     *             'id' =>
     *             array (
     *               'type' => 'int',
     *               'format' => NULL,
     *             ),
     *             'custom_data_table_id' =>
     *             array (
     *               'type' => 'int',
     *               'format' => NULL,
     *             ),
     *             'name' =>
     *             array (
     *               'type' => 'text',
     *               'format' => NULL,
     *             ),
     *             'type' =>
     *             array (
     *               'type' => 'varchar(32)',
     *               'format' => NULL,
     *             ),
     *             'type_params' =>
     *             array (
     *               'type' => 'json',
     *               'format' => NULL,
     *             ),
     *             'created' =>
     *             array (
     *               'type' => 'datetime',
     *               'format' => 'date-time',
     *             ),
     *             'updated' =>
     *             array (
     *               'type' => 'datetime',
     *               'format' => 'date-time',
     *             ),
     *           ),
     *         ),
     *       ),
     *     ),
     *   ),
     *   'responses' =>
     *   array (
     *     200 =>
     *     array (
     *       'content' =>
     *       array (
     *         'application/json' =>
     *         array (
     *           'schema' =>
     *           array (
     *             'type' => 'object',
     *             'properties' =>
     *             array (
     *               'id' =>
     *               array (
     *                 'type' => 'int',
     *                 'format' => NULL,
     *               ),
     *               'custom_data_table_id' =>
     *               array (
     *                 'type' => 'int',
     *                 'format' => NULL,
     *               ),
     *               'name' =>
     *               array (
     *                 'type' => 'text',
     *                 'format' => NULL,
     *               ),
     *               'type' =>
     *               array (
     *                 'type' => 'varchar(32)',
     *                 'format' => NULL,
     *               ),
     *               'type_params' =>
     *               array (
     *                 'type' => 'json',
     *                 'format' => NULL,
     *               ),
     *               'created' =>
     *               array (
     *                 'type' => 'datetime',
     *                 'format' => 'date-time',
     *               ),
     *               'updated' =>
     *               array (
     *                 'type' => 'datetime',
     *                 'format' => 'date-time',
     *               ),
     *             ),
     *           ),
     *         ),
     *       ),
     *     ),
     *   ),
     * )
     **/
    public function insert($data)
    {
        $this->will('CustomData', 'add');
        $CustomData = new \CustomData\CustomData();
        $id = $CustomData->insert($data);
        return $CustomData->getById($id);
    }

    /**
     * @ApiEndpoint(
     *   'type' => 'put',
     *   'url' => 'CustomData/{id}',
     *   'tags' =>
     *   array (
     *     0 => 'CustomData-CustomData',
     *   ),
     *   'description' => 'Insert one CustomData',
     *   'parameters' =>
     *   array (
     *     0 =>
     *     array (
     *       'name' => 'id',
     *       'in' => 'path',
     *       'required' => true,
     *     ),
     *   ),
     *   'requestBody' =>
     *   array (
     *     'content' =>
     *     array (
     *       'application/json' =>
     *       array (
     *         'schema' =>
     *         array (
     *           'type' => 'object',
     *           'properties' =>
     *           array (
     *             'id' =>
     *             array (
     *               'type' => 'int',
     *               'format' => NULL,
     *             ),
     *             'custom_data_table_id' =>
     *             array (
     *               'type' => 'int',
     *               'format' => NULL,
     *             ),
     *             'name' =>
     *             array (
     *               'type' => 'text',
     *               'format' => NULL,
     *             ),
     *             'type' =>
     *             array (
     *               'type' => 'varchar(32)',
     *               'format' => NULL,
     *             ),
     *             'type_params' =>
     *             array (
     *               'type' => 'json',
     *               'format' => NULL,
     *             ),
     *             'created' =>
     *             array (
     *               'type' => 'datetime',
     *               'format' => 'date-time',
     *             ),
     *             'updated' =>
     *             array (
     *               'type' => 'datetime',
     *               'format' => 'date-time',
     *             ),
     *           ),
     *         ),
     *       ),
     *     ),
     *   ),
     *   'responses' =>
     *   array (
     *     200 =>
     *     array (
     *       'content' =>
     *       array (
     *         'application/json' =>
     *         array (
     *           'schema' =>
     *           array (
     *             'type' => 'object',
     *             'properties' =>
     *             array (
     *               'id' =>
     *               array (
     *                 'type' => 'int',
     *                 'format' => NULL,
     *               ),
     *               'custom_data_table_id' =>
     *               array (
     *                 'type' => 'int',
     *                 'format' => NULL,
     *               ),
     *               'name' =>
     *               array (
     *                 'type' => 'text',
     *                 'format' => NULL,
     *               ),
     *               'type' =>
     *               array (
     *                 'type' => 'varchar(32)',
     *                 'format' => NULL,
     *               ),
     *               'type_params' =>
     *               array (
     *                 'type' => 'json',
     *                 'format' => NULL,
     *               ),
     *               'created' =>
     *               array (
     *                 'type' => 'datetime',
     *                 'format' => 'date-time',
     *               ),
     *               'updated' =>
     *               array (
     *                 'type' => 'datetime',
     *                 'format' => 'date-time',
     *               ),
     *             ),
     *           ),
     *         ),
     *       ),
     *     ),
     *   ),
     * )
     **/
    public function update($data, int $id)
    {
        $this->will('CustomData', 'edit');
        $CustomData = new \CustomData\CustomData();
        $CustomData->update($id, $data);
        return $CustomData->getById($id);
    }


}
