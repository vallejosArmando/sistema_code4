<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AreaModel;
use App\Models\SistemaModel;
use App\Models\AccesoModel;
use App\Models\OpcionModel;
use App\Models\GrupoModel;

class Area extends BAseController
{
    protected $sos_grupo;
    protected $sos_opcion;
    protected $sos_acceso;
    protected $sos_sistema;
    protected $sos_area;
    protected $reglas;
    public function __construct()
    {
        $this->sos_area = new AreaModel();
        $this->sos_sistema = new SistemaModel();
        $this->sos_sistema = new SistemaModel();
        $this->sos_acceso = new AccesoModel();
        $this->sos_opcion = new OpcionModel();
        $this->sos_grupo = new GrupoModel();
        helper(['form']);
        $this->reglas = [
            'nombre' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'descripcion' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']]
        ];
    }

    public function index()
    {
        $matriz = $this->sos_area->where('estado', 1)->findAll();
        $datos = [
            'titulo' => 'Areas',
            'datos' => $matriz
        ];
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('area/inicio', $datos);
        echo view('layout/footer');
    }
    public function agregar()
    {
        $matriz = [
            'titulo' => 'Agregar Area'
        ];
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('area/agregar', $matriz);
        echo view('layout/footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->sos_area->save([
                'id_sistema' => 1,
                'usuario' => 1,
                'estado' => 1,
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion')

            ]);
            return redirect()->to(base_url() . '/area');
        } else {
            $datos = [
                'titulo' => 'Agregar Area',
                'validation' => $this->validator,
            ];
            $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header', $datos);
            echo view('area/agregar', $datos);
            echo view('layout/footer');
        }
    }
    public function editar($id, $valor = null)
    {
        $consulta =  $this->sos_area->where('id', $id)->first();
        if ($valor != null) {
            $datos = [
                'titulo' => 'Editar Area',
                'datos' => $this->$consulta, 'validation' => $valor
            ];
        } else {
            $datos = [
                'titulo' => 'Editar area',
                'datos' => $consulta
            ];
        }
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('area/editar', $datos);
        echo view('layout/footer');
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->sos_area->update($this->request->getPost('id'), [
                'id' => $this->request->getPost('id'),
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion')
            ]);

            return redirect()->to(base_url() . '/area');
        } else {
            return $this->editar($this->reuquest->getPost('id'), $this->validator);
        }
    }
    public function eliminar($id)
    {

        $this->sos_area->update($id, ['estado' => 0]);

        return  redirect()->to(base_url() . '/area');
    }
    public function buscarr()
    {
        $nombre = $this->request->getPost('nombre');

        $datoss['areas'] = $this->sos_area->buscar($nombre);


        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();


        echo view('layout/header', $datos);
        echo view('empleado/agregar_bs', $datoss);
        echo view('layout/footer');
    }
    public function select()
    {


        if ($this->request->isAJAX()) {
            $persona = $this->request->getGet('id');


            //$db = \Config\Database::connect();
            $datos = $this->db->table('area')
            ->like('nombre', $persona)->get();
            if ($datos->getNumRows() > 0) {
                $list = [];
                $key = 0;
                foreach ($datos->getResultArray() as $row) :
                    $list[$key]['id'] = $row['id'];
                    $list[$key]['text'] = $row['nombre'];
                    $key++;
                endforeach;


                echo json_encode($list);
            }
        }
    }
}
