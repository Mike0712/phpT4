<?php

namespace App\Models;

use T4\Orm\Model;

/**
 * Class Albums
 * @package App\Models
 *
 * @property string $title
 * @property int $year
 */

class Albums
    extends Model
{
    public static $schema = [
        'table' => 'albums',
        'columns' => [
            'title' => ['type' => 'string'],
            'year' => ['type' => 'int'],
        ],
        'relations' => [
            'songs' => [
                'type'=> self::HAS_MANY,
                'model' => Songs::class,
            ],
        ],
    ];
}