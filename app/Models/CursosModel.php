<?php namespace App\Models;

use CodeIgniter\Model;

class CursosModel extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'idCategoria', 'preco'];
    protected $validationRules    = [
        'nome' => 'required|max_length[50]',
        'idCategoria' => 'required|max_length[50]',
        'preco' => 'required|decimal',
    ];
}