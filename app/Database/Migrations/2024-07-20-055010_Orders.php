<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
{
    public $fields = [
        'id' => [
            'type' => 'INT',
            'constraint' => 5, 
            'unsigned' => true, 
            'auto_increment' => true
        ],
        'product_id' => [
            'type' => 'INT',
            'constraint' => 5, 
            'unsigned' => TRUE
        ],
        'price' => [
            'type' => 'FLOAT', 
            'constraint' => 5
        ],
        'qty' => [
            'type' => 'INT', 
            'constraint' => 5
        ],
        'created_at datetime default current_timestamp',
        'updated_at datetime default null',
        'deleted_at datetime default null',
    ];

    public function up()
    {
        $this->forge->addField($this->fields);
        $this->forge->addForeignKey('product_id','products','id','NULL','NULL');
        $this->forge->addKey('id', true);
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropForeignKey('products','product_id');
        $this->forge->dropTable('orders');
    }
}
