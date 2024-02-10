<?php

namespace CustomData\Api;

class CustomDataSchemaApi extends \Core\ApiController
{
    /**
     * @ApiEndpoint(
     *   'type' => 'get',
     *   'url' => 'CustomDataSchema',
     *   'tags' =>
     *   array (
     *     0 => 'CustomData-CustomDataSchema',
     *   ),
     *   'description' => 'Get list of CustomDataSchema',
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
     *                 'name' =>
     *                 array (
     *                   'type' => 'text',
     *                   'format' => NULL,
     *                 ),
     *                 'is_archived' =>
     *                 array (
     *                   'type' => 'boolean',
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
        $this->will('CustomDataSchema', 'show');
        $CustomDataSchema = new \CustomData\CustomDataSchema();
        return $CustomDataSchema->getAll();
    }

    /**
     * @ApiEndpoint(
     *   'type' => 'get',
     *   'url' => 'CustomDataSchema/{id}',
     *   'tags' =>
     *   array (
     *     0 => 'CustomData-CustomDataSchema',
     *   ),
     *   'description' => 'Get one CustomDataSchema',
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
     *               'name' =>
     *               array (
     *                 'type' => 'text',
     *                 'format' => NULL,
     *               ),
     *               'is_archived' =>
     *               array (
     *                 'type' => 'boolean',
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
        $this->will('CustomDataSchema', 'show');
        $CustomDataSchema = new \CustomData\CustomDataSchema();
        return $CustomDataSchema->getById($id);
    }

    /**
     * @ApiEndpoint(
     *   'type' => 'post',
     *   'url' => 'CustomDataSchema',
     *   'tags' =>
     *   array (
     *     0 => 'CustomData-CustomDataSchema',
     *   ),
     *   'description' => 'Insert one CustomDataSchema',
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
     *             'name' =>
     *             array (
     *               'type' => 'text',
     *               'format' => NULL,
     *             ),
     *             'is_archived' =>
     *             array (
     *               'type' => 'boolean',
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
     *               'name' =>
     *               array (
     *                 'type' => 'text',
     *                 'format' => NULL,
     *               ),
     *               'is_archived' =>
     *               array (
     *                 'type' => 'boolean',
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
        $this->will('CustomDataSchema', 'add');
        $CustomDataSchema = new \CustomData\CustomDataSchema();
        $id = $CustomDataSchema->insert($data);
        return $CustomDataSchema->getById($id);
    }

    /**
     * @ApiEndpoint(
     *   'type' => 'put',
     *   'url' => 'CustomDataSchema/{id}',
     *   'tags' =>
     *   array (
     *     0 => 'CustomData-CustomDataSchema',
     *   ),
     *   'description' => 'Insert one CustomDataSchema',
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
     *             'name' =>
     *             array (
     *               'type' => 'text',
     *               'format' => NULL,
     *             ),
     *             'is_archived' =>
     *             array (
     *               'type' => 'boolean',
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
     *               'name' =>
     *               array (
     *                 'type' => 'text',
     *                 'format' => NULL,
     *               ),
     *               'is_archived' =>
     *               array (
     *                 'type' => 'boolean',
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
        $this->will('CustomDataSchema', 'edit');
        $CustomDataSchema = new \CustomData\CustomDataSchema();
        $CustomDataSchema->update($id, $data);
        return $CustomDataSchema->getById($id);
    }


}
