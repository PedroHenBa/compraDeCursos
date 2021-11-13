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

    public function show($id = null)
    {
        $model = new CursosModel();
        $data = $model->getWhere(["id" => $id])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound(
            "Nenhum curso encontrado com esse id " . $id
        );
    }

    public function showByName($name = null)
    {
        $model = new CursosModel();
        $data = $model->getWhere(["name" => $name])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound(
            "Nenhum curso encontrado com esse id " . $name
        );
    }

    public function showCursosByCategoria($id = null)
    {
        $model = new CursosModel();
        $data = $model->getWhere(["idCategoria" => $id])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound(
            "Nenhum curso encontrado com essa categoria " . $id
        );
    }

    public function delete($id = null)
    {
        $model = new CursosModel();
        $data = $model->find($id);

        if ($data) {
            $model->delete($id);
            $response = [
                "status" => 200,
                "error" => null,
                "messages" => [
                    "success" => "Curso removido",
                ],
            ];
            return $this->respondDeleted($response);
        }

        return $this->failNotFound(
            "Nenhum curso encontrado com esse id " . $id
        );
    }
}
