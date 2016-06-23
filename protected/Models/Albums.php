<?php

namespace App\Models;

use T4\Orm\Model;

class Albums
    extends Model
{
    public static $schema = [
        'table' => 'albums',
        'columns' => [
            'title' => ['type' => 'string'],
            'year' => ['type' => 'string'],
        ],
    ];
}