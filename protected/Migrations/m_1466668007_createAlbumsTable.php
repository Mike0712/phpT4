<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1466668007_createAlbumsTable
    extends Migration
{

    public function up()
    {
        $this->createTable('albums', [
            'title' => ['type' => 'string'],
            'year' => ['type' => 'int'],
        ]);
    }

    public function down()
    {
        $this->dropTable('albums');
    }
    
}