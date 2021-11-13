<?php namespace App\Models;

use CodeIgniter\Model;

class CursosModel extends Model
{
    protected $table = "cursos";
    protected $primaryKey = "id";
    protected $allowedFields = ["name", "nomeCategoria", "preco"];
    protected $validationRules = [
        "name" => "required|max_length[50]",
        "nomeCategoria" => "required|max_length[50]",
        "preco" => "required|decimal",
    ];
}
