<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public $fields = [
        'id' => [
            'type' => 'INT',
            'constraint' => 5, 
            'unsigned' => true, 
            'auto_increment' => true
        ],
        'parent_id' => [
            'type' => 'INT'
        ],
        'name' => [
            'type' => 'VARCHAR', 
            'constraint' => 200
        ],
        'email' => [
            'type' => 'VARCHAR', 
            'constraint' => 200
        ],
        'password' => [
            'type' => 'VARCHAR', 
            'constraint' => 200
        ],
        'created_at datetime default current_timestamp',
        'updated_at datetime default null',
        'deleted_at datetime default null',
    ];

    public function up()
    {
        $this->forge->addField($this->fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
