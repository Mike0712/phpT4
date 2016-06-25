<?php

namespace App\Models;


use T4\Orm\Model;

/**
 * Class Biography
 * @package App\Models
 *
 * @property string $biography
 *
 * @property \App\Models\Artists $members
 */

class Biography extends
    Model
{
    public static $schema = [
        'table' => 'biography',
        'columns' => [
            'biography' => ['type' => 'text'],
        ],
        'relations' =>[
            'members' => [
                'type' => self::HAS_ONE,
                'model' => Artists::class,
            ],
        ]
    ];
}