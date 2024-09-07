<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateActivitiesTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'activity' => ['type' => 'TEXT'],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,  
            ],
            'created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,  
                'default' => null,  
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('activities', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('activities', true);
    }
}
