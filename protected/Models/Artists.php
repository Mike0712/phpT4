<?php

namespace App\Models;

use T4\Orm\Model;

class Artists
    extends Model
{
    public static $schema = [
        'table' => 'members',
        'columns' => [
            'name' => ['type' => 'string'],
            'biography'  => ['type' => 'text'],
        ],
    ];
}