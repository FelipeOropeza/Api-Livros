<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class JwtAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $authHeader = $request->getHeaderLine('Authorization');

        if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
            return Services::response()
                ->setJSON(['message' => 'Token não encontrado.'])
                ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }

        $token = str_replace('Bearer ', '', $authHeader);

        try {
            $key = getenv('JWT_SECRET') ?: 'minha-chave-secreta';
            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            $request->user = $decoded;

        } catch (Exception $e) {
            return Services::response()
                ->setJSON(['message' => 'Token inválido ou expirado.'])
                ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nada após a requisição
    }
}
