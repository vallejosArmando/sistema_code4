<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\OpcionModel;
use App\Models\SistemaModel;
use App\Models\AccesoModel;
use App\Models\GrupoModel;

class Opcion extends BaseController
{    protected $sos_opcion;
    protected $sos_acceso;
    protected $sos_grupo;
    protected $sos_sistema;
    protected $reglas;

    public function __construct()
    {        $this->sos_sistema = new SistemaModel();
$this->sos_acceso=new AccesoModel();
$this->sos_opcion=new OpcionModel();
$this->sos_grupo=new GrupoModel();

        helper(['form']);
        $this->reglas = [
            'id_grupo' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'op_url' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligator']],
            'nombre' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligator']],
            'mostrar' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'orden' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']]

        ];
    }



    public function index()
    {
        $consultas = $this->sos_opcion->listar();
        $datos = [
            'titulo' => 'Tabla Opcion',
            'datos' => $consultas
        ];
        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('opcion/inicio', $datos);
        echo view('layout/footer');
    }
    public function agregar()
    {

        $grupos = $this->sos_grupo->where('estado', 1)->findAll();
        $datos = [
            'titulo' => 'Agregar Opcion',
            'grupos' => $grupos,
        ];

        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('opcion/agregar', $datos);
        echo view('layout/footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->sos_opcion->save([
                'id_grupo' => $this->request->getPost('id_grupo'),
                'nombre' => $this->request->getPost('nombre'),
                'op_url' => $this->request->getPost('op_url'),
                'mostrar' => $this->request->getPost('mostrar'),
                'orden' => $this->request->getPost('orden'),
                'usuario' => 1,
                'estado' => 1,

            ]);
            return redirect()->to(base_url() . '/opcion');
        } else {
            $grupos = $this->sos_grupo->where('estado', 1)->findAll();
            $datos = [
                'titulo' => 'Agregar Opcion',
                'grupos' => $grupos,
                'validation' => $this->validator,
            ];

            $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header',$datos);
            echo view('opcion/agregar', $datos);
            echo view('layout/footer');
        }
    }
    public function editar($id, $valid = null)
    {
        $consultas = $this->sos_opcion->where('id', $id)->first();
        $grupos = $this->sos_grupo->where('estado', 1)->findAll();

        if ($valid != null) {
            $datos = [
                'titulo' => 'Editar Opcion',
                'datos' => $consultas,
                'grupos' => $grupos,
                'validation' => $this->valid,
            ];
        } else {
            $datos = [
                'titulo' => 'Editar Opcion',
                'datos' => $consultas,
                'grupos' => $grupos,
            ];

            $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header',$datos);
            echo view('opcion/editar', $datos);
            echo view('layout/footer');
        }
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->sos_opcion->update($this->request->getPost('id'), [
                'id_grupo' => $this->request->getPost('id_grupo'),
                'nombre' => $this->request->getPost('nombre'),
                'op_url' => $this->request->getPost('op_url'),
                'mostrar' => $this->request->getPost('mostrar'),
                'orden' => $this->request->getPost('orden'),
            ]);
            return redirect()->to(base_url() . '/opcion');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }
    public function eliminar($id)
    {
        $this->sos_opcion->update($id, ['estado' => 0]);
        return redirect()->to(base_url() . '/opcion');
    }
    public function reingresar()
    {

        echo view('layout/header');
        echo view('opcion/');
        echo view('layout/footer');
    }
}
