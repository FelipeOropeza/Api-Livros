<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Categoria extends ResourceController
{
    public function create()
    {
        return $this->respond("Teste");
    }
}
