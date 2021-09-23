<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TipoModel;
use App\Models\SistemaModel;
use App\Models\AccesoModel;
use App\Models\OpcionModel;
use App\Models\GrupoModel;

class Tipo extends baseController
{
    protected $sos_grupo;
    protected $sos_opcion;
    protected $sos_acceso;
    protected $sos_tipo;
    protected $sos_sistema;
    protected $reglas;
    public function __construct()
    {
        $this->sos_sistema = new SistemaModel();
        $this->sos_acceso = new AccesoModel();
        $this->sos_opcion = new OpcionModel();
        $this->sos_grupo = new GrupoModel();
        $this->sos_tipo = new TipoModel();
        $this->reglas = [
            'nombre' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'descripcion' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']]
        ];
    }
    public function index()
    {
        $consultas = $this->sos_tipo->where('estado', 1)->findAll();

        $datos = ['titulo' => 'Tabla Tipo Empleado', 'datos' => $consultas];
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('tipo/inicio', $datos);
        echo view('layout/footer');
    }
    public function agregar()
    {
        $datos = ['titulo' => 'Agregar Tipo de Empleado'];
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('tipo/agregar', $datos);
        echo view('layout/footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->sos_tipo->save(['tipo' => $this->request->getPost('tipo'),
                'descripcion' => $this->request->getPost('descripcion'),
                'usuario' => 1,
                'estado' => 1
            ]);
            return redirect()->to(base_url() . '/tipo');
        } else {
            $datos = ['titulo' => 'Agregar Tipo de Empleado', 'validation' => $this->validator];
        }
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('tipo/agregar', $datos);
        echo view('layout/footer');
    }
    public function editar($id, $valor = null)
    {
        $consultas = $this->sos_tipo->where('id', $id)->first();
        if ($valor != null) {

            $datos = ['titulo' => 'Editar Tipo de Empleado', 'datos' => $consultas, 'validation' => $valor];
        } else {
            $datos = ['titulo' => 'Editar Tipo de Empleado', 'datos' => $consultas];
        }
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('tipo/editar', $datos);
        echo view('layout/footer');
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $this->sos_tipo->update($this->request->getPost('id'), [
                'tipo' => $this->request->getPost('tipo'),
                'descripcion' => $this->request->getPost('descripcion')
            ]);
            return redirect()->to(base_url() . '/tipo');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }
    public function eliminar($id)
    {
        $this->sos_tipo->update(($id), ['estado' => 0]);
        return redirect()->to(base_url() . '/tipo');
    }
    public function eliminados()
    {

        echo view('layout/header');
        echo view('tipo/header');
        echo view('layout/footer');
    }
    public function reigresar()
    {

        echo view('layout/header');
        echo view('tipo/header');
        echo view('layout/footer');
    }
    public function buscarr()
    {
        $nombre = $this->request->getPost('id_tipo');

        $datoss['tipos'] = $this->sos_tipo->buscar($nombre);


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
            $persona = $this->request->getGet('id_tipo');


            //$db = \Config\Database::connect();
            $datos = $this->db->table('tipo_empleado')
            ->like('nombre', $persona)->get();
            if ($datos->getNumRows() > 0) {
                $list = [];
                $key = 0;
                foreach ($datos->getResultArray() as $row) :
                    $list[$key]['id'] = $row['id'];
                    $list[$key]['text'] = $row['tipo'];
                    $key++;
                endforeach;


                echo json_encode($list);
            }
        }
    }
}
