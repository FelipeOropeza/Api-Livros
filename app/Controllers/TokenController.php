<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TokenController extends ResourceController
{
    public function generateToken()
    {
        $data = $this->request->getJSON();
        
        if (!$data->email) {
            return $this->fail('E-mail é obrigatório.', 400);
        }

        $key = getenv('JWT_SECRET') ?: 'minha-chave-secreta';
        $payload = [
            'iss' => 'sua-api.com',
            'aud' => 'usuario',
            'iat' => time(),
            'exp' => time() + 900,
            'email' => $data->email
        ];

        $jwt = JWT::encode($payload, $key, 'HS256');

        $emailService = \Config\Services::email();
        $emailService->setTo($data->email);
        $emailService->setFrom('felipe2006.co@gmail.com', 'Sistema de Tokens');
        $emailService->setSubject('Seu Token de Acesso');
        $emailService->setMessage("Use este token para acessar: {$jwt}");

        if (!$emailService->send()) {
            return $this->fail('Erro ao enviar o e-mail.', 500);
        }

        return $this->respond([
            'status' => 'success',
            'message' => 'Token JWT enviado por e-mail.'
        ]);
    }
}
