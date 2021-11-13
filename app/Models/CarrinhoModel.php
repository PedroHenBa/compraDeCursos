<?php namespace App\Models;

use CodeIgniter\Model;

class CarrinhoModel extends Model
{
    protected $table = "carrinho";
    protected $primaryKey = "id";
    protected $allowedFields = ["idUser"];
    protected $validationRules = [
        "idUser" => "required|max_length[20]",
    ];
}
