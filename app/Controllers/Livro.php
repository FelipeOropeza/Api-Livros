<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;


class Livro extends ResourceController
{
    public function index()
    {
        return $this->respond(['message' => 'API de livros']);
    }
}
