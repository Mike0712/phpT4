<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1466842162_createStatusTable
    extends Migration
{

    public function up()
    {
        $this->createTable('status', [
            'status' => ['type' => 'string'],
        ]);
    }

    public function down()
    {
        $this->dropTable('status');
    }
    
}