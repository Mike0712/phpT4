<?php

namespace App\Models;

use T4\Orm\Model;

/**
 * Class Article
 * @package App\Models
 *
 * @property string $title
 * @property \App\Models\Article $news
 *
 */

class Category
    extends Model
{
    public static $schema = [
        'table' => 'category',
        'columns' => [
            'title' => ['type' => 'string'],
            ],
        'relations' =>[
            'news' => [
                    'type' => self::HAS_MANY,
                    'model' => Article::class,
            ],
        ],
    ];
}