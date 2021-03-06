<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CategoriasModel;

class Categorias extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        $model = new CategoriasModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    public function create()
    {
        $model = new CategoriasModel();
        $data = [
            "nome" => $this->request->getVar("nome"),
        ];

        if ($model->insert($data)) {
            $response = [
                "status" => 201,
                "error" => null,
                "messages" => [
                    "success" => "Categoria salva",
                ],
            ];

            return $this->respondCreated($response);
        }

        return $this->fail($model->errors());
    }
}
