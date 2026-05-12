<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmployees extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],

            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],

            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],

            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],

            'address' => [
                'type' => 'TEXT'
            ],

            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
