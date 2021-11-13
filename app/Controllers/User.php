<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;

class User extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        $model = new UsersModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    public function register()
    {
        $model = new UsersModel();
        $data = [
            "email" => $this->request->getVar("email"),
            "senha" => password_hash(
                $this->request->getVar("senha"),
                PASSWORD_DEFAULT
            ),
        ];

        if ($model->insert($data)) {
            $response = [
                "status" => 201,
                "error" => null,
                "messages" => [
                    "success" => "Dados salvos",
                ],
            ];
            return $this->respondCreated($response);
        }

        return $this->fail($model->errors());
    }

    public function login()
    {
        $model = new UsersModel();

        $email = $this->request->getVar("email");
        $senha = $this->request->getVar("senha");

        $data = $model->getWhere(["email" => $email])->getResult();

        if ($data) {
            $pass = $data[0]->$senha;
            $verifyPassword = password_verify($senha, $pass);

            if ($verifyPassword) {
                return $this->respond("Usuario Logado");
            }
            return $this->failNotFound("Senha incorreta");
        } else {
            return $this->failNotFound("Email incorreto");
        }
    }
}
