<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CursosModel;

class Cursos extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new CursosModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    public function create()
    {
        $model = new CursosModel();
        $data = $this->request->getJSON();

        if ($model->insert($data)) {
            $response = [
                "status" => 201,
                "error" => null,
                "messages" => [
                    "success" => "Curso salvo",
                ],
            ];
            return $this->respondCreated($response);
        }

        return $this->fail($model->errors());
    }

    public function show($name = null)
    {
        $model = new CursosModel();
        $data = $model->getWhere(["name" => $name])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound(
            "Nenhum curso encontrado com esse nome " . $name
        );
    }

    public function categoria($nome = null)
    {
        $model = new CursosModel();
        $data = $model->getWhere(["nomeCategoria" => $nome])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound(
            "Nenhum curso encontrado com essa categoria " . $id
        );
    }
}
