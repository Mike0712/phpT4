<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1466668141_createMembersTable
    extends Migration
{

    public function up()
    {
        $this->createTable('members', [
            'name' => ['type' => 'string'],
            '__biography_id' => ['type' => 'link'],
            '__status_id' => ['type' => 'link'],
        ]);
    }

    public function down()
    {
        $this->dropTable('members');
    }
    
}