<?php

namespace App\Models;

use CodeIgniter\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'categoria_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['categoria_id', 'nome'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'nome' => 'required|min_length[3]|max_length[255]',
        'categoria_id' => 'required|is_unique[categorias.categoria_id]',
    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome da categoria é obrigatório',
            'min_length' => 'O nome da categoria deve ter pelo menos 3 caracteres',
            'max_length' => 'O nome da categoria deve ter no máximo 255 caracteres',
        ],
        'categoria_id' => [
            'required' => 'O ID da categoria é obrigatório',
            'is_unique' => 'O ID da categoria já existe',
        ],
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
