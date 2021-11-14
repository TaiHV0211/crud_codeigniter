<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePurchase extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'name'          => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'price'          => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'email_address'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'storage'          => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'databases'          => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'domains'          => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'support'          => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('purchases');
    }

    public function down()
    {
        $this->forge->dropTable('purchases');
    }
}
