<?php

namespace App\Controllers;

use App\Models\Categoria;
use CodeIgniter\RESTful\ResourceController;

class CategoriaController extends ResourceController
{
    public function create()
    {
        try {
            $data = $this->request->getJSON();

            if (!$data) {
                return $this->failValidationErrors('Dados não fornecidos ou mal formatados.');
            }

            $categoriaModel = new Categoria();

            if ($categoriaModel->insert($data)) {
                $response = [
                    'status' => 201,
                    'error' => null,
                    'messages' => [
                        'success' => 'Dados salvos com sucesso!'
                    ]
                ];
                return $this->respondCreated($response);
            } else {
                return $this->failValidationErrors($categoriaModel->errors());
            }

        } catch (\Throwable $th) {
            return $this->failServerError('Ocorreu um erro inesperado. ' . $th->getMessage());
        }
    }

    public function getAllCategory(){
        try {
            $categoriaModel = new Categoria();

            $response = $categoriaModel->findAll();

            if(empty($response)){
                return $this->failNotFound('Nenhuma categoria encontrada.');
            }

            return $this->respond($response);
        } catch (\Throwable $th) {
            return $this->failServerError('Ocorreu um erro inesperado. ' . $th->getMessage());
        }
    }
}
