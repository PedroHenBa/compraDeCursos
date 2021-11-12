<?php namespace App\Models;

use CodeIgniter\Model;

class CarrinhoModel extends Model
{
    protected $table = "carrinho";
    protected $primaryKey = "id";
    protected $allowedFields = ["idCurso", "idUser"];
    protected $validationRules = [
        "idCurso" => "required|max_length[50]",
        "idUser" => "required|max_length[20]",
    ];
}
