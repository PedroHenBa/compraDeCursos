<?php namespace App\Models;

use CodeIgniter\Model;

class CursosModel extends Model
{
    protected $table = "cursos";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "name",
        "nomeCategoria",
        "preco",
        "descricao",
        "imagemUrl",
    ];
    protected $validationRules = [
        "name" => "required|max_length[50]",
        "nomeCategoria" => "required|max_length[50]",
        "preco" => "required|decimal",
        "descricao" => "required|max_length[255]",
        "imagemUrl" => "max_length[255]",
    ];
}
