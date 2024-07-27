<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Products extends Migration
{
    public $fields = [
        'id' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true, 
            'auto_increment' => TRUE,
        ],
        'user_id' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => TRUE,
        ],
        'cat_id' => [
            'type' => 'INT',
            'constraint' => 5,
        ],
        'name' => [
            'type' => 'VARCHAR',
            'constraint' => 350,
        ],
        'price' => [
            'type' => 'INT',
            'constraint' => 11,
        ],
        'qty' => [
            'type' => 'INT',
            'constraint' => 11,
        ],
        'discription' => [
            'type' => 'VARCHAR',
            'constraint' => 350,
        ],
        'image' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
        ],
        'created_at datetime default current_timestamp',
        'updated_at datetime default null',
        'deleted_at datetime default null',
    ];

    public function up()
    {
        $this->forge->addField($this->fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
