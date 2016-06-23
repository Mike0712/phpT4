<?php

namespace App\Models;

use T4\Orm\Model;

class Article
    extends Model
{
    public static $schema = [
        'table' => 'news',
        'columns' => [
            'title' => ['type' => 'string'],
            'lead'  => ['type' => 'text'],
        ],
    ];
}