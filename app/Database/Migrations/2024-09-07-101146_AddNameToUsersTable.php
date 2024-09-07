<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNameToUsersTable extends Migration
{
    public function up()
    {
        //
        $fields = [
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => 'User Name',
                'after' => 'username'
            ],
        ];

        // Add the new column to the existing 'users' table
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('users', 'name');
    }
}
