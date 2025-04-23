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

    public function create()
    {
        try {
            $data = $this->request->getPost();
            $image = $this->request->getFile('url_imagem');

            if (!$data || !$image->isValid()) {
                return $this->failValidationErrors('Dados ou imagem inválidos.');
            }

            $firebase = new \App\Libraries\Firebase();
            $filename = uniqid() . '.' . $image->getExtension();
            $imagePath = $image->getTempName();

            $url = $firebase->uploadImage($imagePath, $filename);
            $data['url_imagem'] = $url;

            $livroModel = new Livro();
            if ($livroModel->insert($data)) {
                return $this->respondCreated([
                    'status' => 201,
                    'messages' => ['success' => 'Livro criado com sucesso!'],
                ]);
            } else {
                return $this->failValidationErrors($livroModel->errors());
            }

        } catch (\Throwable $th) {
            return $this->failServerError('Erro interno: ' . $th->getMessage());
        }
    }


    public function getAllBook()
    {
        try {
            $livroModel = new Livro();

            $response = $livroModel->findAll();

            if (empty($response)) {
                return $this->failNotFound('Nenhum livro encontrado.');
            }

            return $this->respond($response);
        } catch (\Throwable $th) {
            return $this->failServerError('Ocorreu um erro inesperado. ' . $th->getMessage());
        }
    }
}
