<?php namespace App\Models;

use CodeIgniter\Model;

class CursosCarrinhoModel extends Model
{
    protected $table = "cursoscarrinho";
    protected $primaryKey = "id";
    protected $allowedFields = ["idCarrinho", "idCurso"];
    protected $validationRules = [
        "idCarrinho" => "required|max_length[50]",
        "idCurso" => "required|max_length[50]",
    ];
}
