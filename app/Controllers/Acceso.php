<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AccesoModel;
use App\Models\RolModel;
use App\Models\GrupoModel;
use App\Models\OpcionModel;
use App\Models\SistemaModel;

class Acceso extends BaseController
{
    private $sos_acceso;
    private $sos_opcion;
    private $sos_grupo;
    private $sos_rol;
    private $sos_sistema;
    private $reglas;

    public function __construct()
    {
        $this->sos_acceso = new AccesoModel();
        $this->sos_rol = new RolModel();
        $this->sos_grupo = new GrupoModel();
        $this->sos_opcion = new OpcionModel();
        $this->sos_sistema = new SistemaModel();

        helper(['form']);

        $this->reglas = [

            'id_grupo' => ['rules' => 'required', 'errors' => ['required' => 'El campo  {field} es obligatorio.']],
            'id_opcion' => ['rules' => 'required', 'errors' => ['required' => 'El campo  {field} es obligatorio.']],
            'id_rol' => ['rules' => 'required', 'errors' => ['required' => 'El campo  {field} es obligatorio.']]

        ];
    }


    public function index()
    {
        $consultas = $this->sos_acceso->listar();

        $datos = [
            'titulo' => 'Tabla acceso',
            'datos' => $consultas,
        ];
        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('acceso/inicio', $datos);
        echo view('layout/footer');
    }
    public function agregar()
    {
        $opciones = $this->sos_opcion->where('estado', 1)->findAll();
        $role = $this->sos_rol->where('estado', 1)->findAll();
        $grupos = $this->sos_grupo->where('estado', 1)->findAll();


        $matriz = [
            'grupos' => $grupos,
            'opciones' => $opciones,
            'roles' => $role,
            'titulo' => 'Agregar Acceso',
        ];
        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('acceso/agregar', $matriz);
        echo view('layout/footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->sos_acceso->save([
                'id_grupo' => $this->request->getPost('id_grupo'),
                'id_opcion' => $this->request->getPost('id_opcion'),
                'id_rol' => $this->request->getPost('id_rol'),
                'permisos' => $this->request->getPost('permisos'),
                'usuario' => 1,
                'estado' => 1
            ]);
            return redirect()->to(base_url() . '/acceso');
        } else {
            $opciones = $this->sos_opcion->where('estado', 1)->findAll();
            $role = $this->sos_rol->where('estado', 1)->findAll();
            $grupos = $this->sos_grupo->where('estado', 1)->findAll();
            $datos = [
                'grupos' => $grupos,
                'opciones' => $opciones,
                'roles' => $role,
                'titulo' => 'Agregar Acceso',
                'validation' => $this->validator
            ];
        }
        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('acceso/agregar', $datos);
        echo view('layout/footer');
    }
    public function editar($id, $valor = null)
    {
        $consultas = $this->sos_acceso->where('id', $id)->first();
        $opciones = $this->sos_opcion->where('estado', 1)->findAll();
        $role = $this->sos_rol->where('estado', 1)->findAll();
        $grupos = $this->sos_grupo->where('estado', 1)->findAll();
        if ($valor != null) {
            $datos = [
                'datos' => $consultas,
                'grupos' => $grupos,
                'opciones' => $opciones,
                'roles' => $role,
                'titulo' => 'Editar Acceso',
                'validation' => $valor
            ];
        } else {
            $datos = [
                'datos' => $consultas,
                'grupos' => $grupos,
                'opciones' => $opciones,
                'roles' => $role,
                'titulo' => 'Editar Acceso'

            ];
        }
        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('acceso/editar', $datos);
        echo view('layout/footer');
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->sos_acceso->update($this->request->getPost('id'), [
                'id_grupo' => $this->request->getPost('id_grupo'),
                'id_opcion' => $this->request->getPost('id_opcion'),
                'id_rol' => $this->request->getPost('id_rol'),
                'permisos' => $this->request->getPost('permisos'),
            ]);
            return redirect()->to(base_url('/acceso'));
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }
    public function eliminar($id)
    {
        $this->sos_acceso->update($id, ['estado' => 0]);
        return redirect()->to(base_url('/acceso'));
    }
    public function eliminados()
    {

        echo view('layout/header');
        echo view('acceso/');
        echo view('layout/footer');
    }
    public function reingresar()
    {

        echo view('layout/header');
        echo view('acceso/');
        echo view('layout/footer');
    }
    public function buscar()
    {

        $id_grupo = $this->request->getPost('id_grupo');
        $id_opcion = $this->request->getPost('id_opcion');
        $id_rol = $this->request->getPost('id_rol');

        $consulta = $this->sos_acceso->buscar($id_grupo, $id_opcion, $id_rol);

        $datoss = [
            'titulo' => 'Buscar Acceso',
            'datos' => $consulta,
        ];
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();


        echo view('layout/header', $datos);
        echo view('acceso/buscar', $datoss);
        echo view('layout/footer');
    }
}
