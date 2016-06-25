<?php

namespace App\Models;


use T4\Orm\Model;

/**
 * Class Songs
 * @package App\Models
 *
 * @property string $song
 * @property string $link
 * @property \App\Models\Albums $album
 */
class Songs extends
    Model
{
    public static $schema = [
        'table' => 'news',
        'columns' => [
            'song' => ['type' => 'string'],
            'link' => ['type' => 'text'],
        ],
        'relations' => [
            'album' => [
                'type' => self::BELONGS_TO,
                'model' => Albums::class,
            ],
        ],
    ];
}