<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JefeareaModel;
use App\Models\AreaModel;
use App\Models\SistemaModel;
use App\Models\AccesoModel;
use App\Models\OpcionModel;
use App\Models\GrupoModel;

class Jefe_area extends BaseController
{
    protected $sos_grupo;
    protected $sos_opcion;
    protected $sos_acceso;
    protected $sos_sistema;

    protected $sos_jefearea;
    protected $sos_area;
    protected $reglas;
    public function __construct()
    {
        $this->sos_sistema = new SistemaModel();
        $this->sos_acceso = new AccesoModel();
        $this->sos_opcion = new OpcionModel();
        $this->sos_grupo = new GrupoModel();
        $this->sos_jefearea = new JefeareaModel();
        $this->sos_area = new AreaModel();
        $this->reglas = [

            'id_area' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'nombres' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'ap' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'am' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'ci' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'telefono' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'correo' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'fec_inicio' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'fec_fin' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']]

        ];
    }



    public function index()
    {
        $consultas = $this->sos_jefearea->listar();

        $datos = [
            'titulo' => 'Tabla Empleados',
            'datos' => $consultas
        ];

        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('jefe_area/inicio', $datos);
        echo view('layout/footer');
    }
    public function agregar()
    {
        $areas = $this->sos_area->where('estado', 1)->findAll();
        $datos = [
            'titulo' => 'Agregar Empleados',
            'areas' => $areas,

        ];
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();

        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('jefe_area/agregar', $datos);
        echo view('layout/footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->sos_jefearea->save([
                'id_area' => $this->request->getPost('id_area'),
                'nombres' => $this->request->getPost('nombres'),
                'ap' => $this->request->getPost('ap'),
                'am' => $this->request->getPost('am'),
                'ci' => $this->request->getPost('ci'),
                'telefono' => $this->request->getPost('telefono'),
                'correo' => $this->request->getPost('correo'),
                'fec_inicio' => $this->request->getPost('fec_inicio'),
                'fec_fin' => $this->request->getPost('fec_fin'),

                'usuario' => 1,
                'estado' => 1


            ]);
            return redirect()->to(base_url() . '/jefe_area');
        } else {
            $areas = $this->sos_area->where('estado', 1)->findAll();
            $datos = ['titulo' => 'Agregar Jefe de area',  'areas' => $areas, 'validation' => $this->validator];
            $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header', $datos);
            echo view('jefe_area/agregar', $datos);
            echo view('layout/footer');
        }
    }
    public function editar($id, $valid = null)
    {
        $consultas = $this->sos_jefearea->where('id', $id)->first();
        $areas = $this->sos_area->where('estado', 1)->findAll();
        if ($valid != null) {
            $datos = [
                'titulo' => 'Editar Jefe de area',
                'datos' => $consultas,
                'areas' => $areas,
                'validator' => $this->valid
            ];
        } else {
            $datos = [
                'titulo' => 'Editar Jefe de area',
                'areas' => $areas,
                'datos' => $consultas
            ];
        }


        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('jefe_area/editar', $datos);
        echo view('layout/footer');
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == 'post' && $this->validate($this->reglas)) {
            $this->sos_jefearea->update($this->request->getPost('id'), [
                'id_area' => $this->request->getPost('id_area'),
                'nombres' => $this->request->getPost('nombres'),
                'ap' => $this->request->getPost('ap'),
                'am' => $this->request->getPost('am'),
                'ci' => $this->request->getPost('ci'),
                'telefono' => $this->request->getPost('telefono'),
                'correo' => $this->request->getPost('correo'),
                'fec_inicio' => $this->request->getPost('fec_inicio'),
                'fec_fin' => $this->request->getPost('fec_fin'),
            ]);
            return redirect()->to(base_url() . '/jefe_area');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }
    public function eliminar($id)
    {
        $this->sos_jefearea->update($id, ['estado' => 0]);
        return redirect()->to(base_url() . '/jefe_area');
    }
}
