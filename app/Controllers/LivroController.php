<?php

namespace App\Controllers;

use App\Models\Livro;
use CodeIgniter\RESTful\ResourceController;


class LivroController extends ResourceController
{
    public function index()
    {
        return $this->respond(['message' => 'API de livros']);
    }

    public function create(){
        try {
            $data = $this->request->getJSON();

            if (!$data) {
                return $this->failValidationErrors('Dados não fornecidos ou mal formatados.');
            }

            $livroModel = new Livro();

            if ($livroModel->insert($data)) {
                $response = [
                    'status' => 201,
                    'error' => null,
                    'messages' => [
                        'success' => 'Dados salvos com sucesso!'
                    ]
                ];
                return $this->respondCreated($response);
            } else {
                return $this->failValidationErrors($livroModel->errors());
            }

        } catch (\Throwable $th) {
            return $this->failServerError('Ocorreu um erro inesperado. ' . $th->getMessage());
        }
    }

    public function getAllBook(){
        try {
            $livroModel = new Livro();

            $response = $livroModel->findAll();

            if(empty($response)){
                return $this->failNotFound('Nenhum livro encontrado.');
            }

            return $this->respond($response);
        } catch (\Throwable $th) {
            return $this->failServerError('Ocorreu um erro inesperado. ' . $th->getMessage());
        }
    }
}
