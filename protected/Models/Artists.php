<?php

namespace App\Models;

use T4\Orm\Model;

/**
 * Class Artists
 * @package App\Models
 *
 * @property string $name
 * @property \App\Models\Biography $biography
 * @property \App\Models\Status $status
 */
class Artists
    extends Model
{
    public static $schema = [
        'table' => 'members',
        'columns' => [
            'name' => ['type' => 'string'],
        ],
        'relations' => [
            'status' => [
                'type' => self::BELONGS_TO,
                'model' => Status::class,
            ],
            'biography' => [
                'type' => self::BELONGS_TO,
                'model' => Biography::class,
            ]
        ],
    ];
}