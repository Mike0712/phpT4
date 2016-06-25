<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1466841769_createBiographyTable
    extends Migration
{

    public function up()
    {
        $this->createTable('biography', [
            'biography' => ['type' => 'text'],
        ]);
    }

    public function down()
    {
        $this->dropTable('biography');
    }
    
}