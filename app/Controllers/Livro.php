<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;


class Livro extends ResourceController
{
    public function index()
    {
        $data = [
            'livros' => [
                'titulo' => 'Teste',
                'assunto' => 'teste'
            ],
        ];

        return $this->respond($data);
    }
}
