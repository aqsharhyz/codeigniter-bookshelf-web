<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateBookTable extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'year' => [
                'type' => 'INT',
                'constraint' => 4,
                'null' => false,
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'summary' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'publisher' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'pageCount' => [
                'type' => 'INT',
                'constraint' => 6,
                'null' => false,
            ],
            'readPage' => [
                'type' => 'INT',
                'constraint' => 6,
                'null' => false,
            ],
            'finished' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => false,
            ],
            'reading' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ]
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_id', 'name']);
        $this->forge->addForeignKey('user_id', 'user', 'id', '', '', 'fk_user_id');
        $this->forge->createTable('book');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('book', 'fk_user_id');
        $this->forge->dropTable('book', true);
    }
}
