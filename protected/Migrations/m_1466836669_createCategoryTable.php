<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1466836669_createCategoryTable
    extends Migration
{

    public function up()
    {
        $this->createTable('category', [
            'title' => ['type' => 'string'],
        ]);
    }

    public function down()
    {
        $this->dropTable('category');
    }
    
}