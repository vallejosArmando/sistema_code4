<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RolMode;
use App\Models\SistemaModel;
use App\Models\AccesoModel;
use App\Models\OpcionModel;
use App\Models\GrupoModel;

class Rol extends BaseController
{protected $sos_grupo;
    protected $sos_opcion;
    protected $sos_acceso;
    protected $aux_rol;
    protected $sos_sistema;
    protected $reglas;
    public function __construct()
    { $this->sos_sistema=new SistemaModel(); 
$this->sos_acceso=new AccesoModel();
$this->sos_opcion=new OpcionModel();
$this->sos_grupo=new GrupoModel();
        $this->aux_rol = new RolMode();
        helper(['form']);
        $this->reglas = [
            'rol' => [
                'rules' => 'required', 'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ]

        ];
    }
    public function index()
    {
        $consultas = $this->aux_rol->listar();
        $datos = [
            'titulo' => 'tabla roles',
            'datos' => $consultas
        ];

        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('rol/inicio', $datos);
        echo view('layout/footer');
    }
    public function nuevo()
    {

        $matriz = ['titulo' => 'Agregar rol'];

        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('rol/agregar', $matriz);
        echo view('layout/footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $this->aux_rol->save([
                'usuario' => 1,
                'estado' => 1,
                'rol' => $this->request->getPost('rol'),

            ]);
            return  redirect()->to(base_url() . '/rol');
        } else {
            $matriz = ['titulo' => 'Agregar rol', 'validation' => $this->validator];
            $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header',$datos);
            echo view('rol/agregar', $matriz);
            echo view('layout/footer');
        }
    }
    public function editar($id, $valid = null)
    {
        $consulta = $this->aux_rol->where('id', $id)->first();

        if ($valid != null) {
            $matriz = ['titulo' => 'Editar rol', 'datos' => $consulta, 'validation' => $valid];
        } else {
            $matriz = ['titulo' => 'Editar rol', 'datos' => $consulta];
        }
        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('rol/editar', $matriz);
        echo view('layout/footer');
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $this->aux_rol->update($this->request->getPost('id'), [
                'rol' => $this->request->getPost('rol')
            ]);
            return  redirect()->to(base_url() . '/rol');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }
    public function eliminar($id)
    {
        $this->aux_rol->update($id, ['estado' => 0]);
        return  redirect()->to(base_url() . '/rol');
    }
    public function eliminados($estado = 0)
    {
        $aux_rol = $this->aux_rol->where('estado', $estado)->findAll();
        $matriz = ['titulo' => 'Eliminados', 'datos' => $aux_rol];
        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);        echo view('rol/eliminados', $matriz);
        echo view('layout/footer');
    }
    public function activar($id)
    {

        $this->aux_rol->update($id, ['estado' => 1]);
        return  redirect()->to(base_url() . '/rol');
    }
}
