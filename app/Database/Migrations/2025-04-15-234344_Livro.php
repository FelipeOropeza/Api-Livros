<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Livro extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'livro_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'url_imagem' => [
                'type' => 'TEXT',
            ],
            'descricao' => [
                'type' => 'TEXT',
            ],
            'data_publicacao' => [
                'type' => 'DATE',
            ],
            'fk_categoria' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true,
            ]

        ]);

        $this->forge->addKey('livro_id', primary: true);
        $this->forge->addForeignKey('fk_categoria', 'categorias', 'categoria_id');
        $this->forge->createTable('livros');
    }

    public function down()
    {
        $this->forge->dropTable('livros');
    }
}
