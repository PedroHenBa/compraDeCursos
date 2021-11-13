<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $allowedFields = ["senha", "email"];
    protected $validationRules = [
        "senha" => "required|max_length[255]",
        "email" => "required|max_length[20]",
    ];
}
