<?php namespace App\Controllers;

use App\Models\CursosCarrinhoModel;
use App\Models\CursosModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CarrinhoModel;
use App\Controllers\Cursos;

class Carrinho extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new CarrinhoModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    public function create()
    {
        $model = new CarrinhoModel();
        $data = $this->request->getJSON();

        if ($model->insert($data)) {
            $response = [
                "status" => 201,
                "error" => null,
                "messages" => [
                    "success" => "Carrinho criado",
                ],
            ];
            return $this->respondCreated($response);
        }

        return $this->fail($model->errors());
    }

    public function add()
    {
        $model = new CursosCarrinhoModel();
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
        $model = new CursosCarrinhoModel();
        $data = $model->getWhere(["idCarrinho" => $id])->getResultArray();
        $idCursos = [];

        if ($data) {
            //Pegando todos id's dos cursos
            for ($i = 0; $i < count($data); $i++) {
                array_push($idCursos, $data[$i]["idCurso"]);
            }

            $data = [];
            $total = 0;

            // Pegando dados dos cursos by id
            for ($i = 0; $i < count($idCursos); $i++) {
                $model = new CursosModel();
                $dataProducts = $model
                    ->getWhere(["id" => $idCursos[$i]])
                    ->getResultArray();
                $total += $dataProducts[0]["preco"];
                array_push($data, $dataProducts[0]);
            }

            array_push($data, ["total" => $total]);
            return $this->respond($data);
        }

        return $this->failNotFound("Nenhum carrinho com esse id " . $id);
    }
}
