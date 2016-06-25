<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 25.06.2016
 * Time: 11:27
 */

namespace App\Models;


use T4\Orm\Model;

/**
 * Class Status
 * @package App\Models
 * @property string $status
 * @property \App\Models\Artists $members
 */
class Status extends
    Model
{
    public static $schema = [
        'table' => 'status',
        'columns' => [
            'status' => ['type' => 'string'],
        ],
        'relations' => [
            'members' => [
                'type' => self::HAS_MANY,
                'model' => Artists::class,
            ],
        ],
    ];
}