<?php

namespace App\Models;

use CodeIgniter\Model;

class Livro extends Model
{
    protected $table            = 'livros';
    protected $primaryKey       = 'livro_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title', 'author', 'url_imagem', 'descricao', 'data_publicacao', 'fk_categoria'
    ];  
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'title'          => 'required|min_length[3]|max_length[50]',  
        'author'         => 'required|min_length[3]|max_length[100]', 
        'url_imagem'     => 'required|valid_url',
        'descricao'      => 'required|min_length[10]',
        'data_publicacao'=> 'required|valid_date[Y-m-d]',
        'fk_categoria'   => 'required|integer',
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'O título do livro é obrigatório.',
            'min_length' => 'O título deve ter pelo menos 3 caracteres.',
            'max_length' => 'O título não pode ter mais de 50 caracteres.',
        ],
        'author' => [
            'required' => 'O autor é obrigatório.',
            'min_length' => 'O autor deve ter pelo menos 3 caracteres.',
            'max_length' => 'O autor não pode ter mais de 100 caracteres.',
        ],
        'url_imagem' => [
            'required' => 'A URL da imagem é obrigatória.',
            'valid_url' => 'A URL da imagem fornecida não é válida.',
        ],
        'descricao' => [
            'required' => 'A descrição é obrigatória.',
            'min_length' => 'A descrição deve ter pelo menos 10 caracteres.',
        ],
        'data_publicacao' => [
            'required' => 'A data de publicação é obrigatória.',
            'valid_date' => 'A data de publicação não é válida. O formato deve ser YYYY-MM-DD.',
        ],
        'fk_categoria' => [
            'required' => 'A categoria é obrigatória.',
            'integer' => 'A categoria deve ser um número inteiro.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
