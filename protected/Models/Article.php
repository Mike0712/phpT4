<?php

namespace App\Models;

use T4\Orm\Model;

/**
 * Class Article
 * @package App\Models
 *
 * @property string $title
 * @property string $lead
 * @property \App\Models\Category $category
 */

class Article
    extends Model
{
    public static $schema = [
        'table' => 'news',
        'columns' => [
            'title' => ['type' => 'string'],
            'lead'  => ['type' => 'text'],
            ],
        'relations' =>[
            'category' => [
                'type' => self::BELONGS_TO,
                'model' => Category::class,
            ],
        ],
    ];
}