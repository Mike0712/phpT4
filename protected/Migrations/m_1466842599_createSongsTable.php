<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1466842599_createSongsTable
    extends Migration
{

    public function up()
    {
        $this->createTable('songs', [
            'song' => ['type' => 'string'],
            'link' => ['type' => 'text'],
            '__albums_id' => ['type' => 'link'],
        ]);
    }

    public function down()
    {
        $this->dropTable('songs');
    }
    
}