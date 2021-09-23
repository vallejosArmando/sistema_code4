<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EmpleadoModel;
use App\Models\AreaModel;
use App\Models\TipoModel;
use App\Models\SistemaModel;
use App\Models\AccesoModel;
use App\Models\OpcionModel;
use App\Models\GrupoModel;

class Empleado extends BaseController
{
    protected $sos_grupo;
    protected $sos_opcion;
    protected $sos_acceso;
    protected $sos_empleado;
    protected $sos_area;
    protected $sos_tipo;
    protected $sos_sistema;
    protected $reglas;
    public function __construct()
    {
        $this->sos_empleado = new EmpleadoModel();
        $this->sos_area = new AreaModel();
        $this->sos_tipo = new TipoModel();
        $this->sos_sistema = new SistemaModel();
        $this->sos_acceso = new AccesoModel();
        $this->sos_opcion = new OpcionModel();
        $this->sos_grupo = new GrupoModel();
        $this->reglas = [
            'id_tipo' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'id_area' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'nombres' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'ap' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'am' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'ci' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'tel_fijo' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'tel_cel' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'direccion' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']]

        ];
    }



    public function index()
    {
        $consultas = $this->sos_empleado->listar();

        $datos = [
            'titulo' => 'Tabla Empleados',
            'datos' => $consultas
        ];
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('empleado/inicio', $datos);
        echo view('layout/footer');
    }
    public function agregar()
    {
        $tipos = $this->sos_tipo->where('estado', 1)->findAll();
        $areas = $this->sos_area->where('estado', 1)->findAll();
        $datos = [
            'titulo' => 'Agregar Empleados',
            'tipos' => $tipos,
            'areas' => $areas,

        ];
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('empleado/agregar', $datos);
        echo view('layout/footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->sos_empleado->save([
                'id_tipo' => $this->request->getPost('id_tipo'),
                'id_area' => $this->request->getPost('id_area'),
                'id_sistema' => 1,
                'nombres' => $this->request->getPost('nombres'),
                'ap' => $this->request->getPost('ap'),
                'am' => $this->request->getPost('am'),
                'ci' => $this->request->getPost('ci'),
                'tel_fijo' => $this->request->getPost('tel_fijo'),
                'tel_cel' => $this->request->getPost('tel_cel'),
                'direccion' => $this->request->getPost('direccion'),
                'usuario' => 1,
                'estado' => 1


            ]);
            return redirect()->to(base_url() . '/empleado');
        } else {
            $tipos = $this->sos_tipo->where('estado', 1)->findAll();
            $areas = $this->sos_area->where('estado', 1)->findAll();
            $datos = ['titulo' => 'Agregar Empleado', 'tipos' => $tipos, 'areas' => $areas, 'validation' => $this->validator];
            $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header', $datos);
            echo view('empleado/agregar_bs', $datos);
            echo view('layout/footer');
        }
    }
    public function editar($id, $valid = null)
    {
        $consultas = $this->sos_empleado->where('id', $id)->first();
        $tipos = $this->sos_tipo->where('estado', 1)->findAll();
        $areas = $this->sos_area->where('estado', 1)->findAll();
        if ($valid != null) {
            $datos = [
                'titulo' => 'Editar Empleado',
                'datos' => $consultas,
                'tipos' => $tipos,
                'areas' => $areas,
                'validator' => $this->valid
            ];
        } else {
            $datos = [
                'titulo' => 'Editar Empleado',
                'tipos' => $tipos,
                'areas' => $areas,
                'datos' => $consultas
            ];
        }

        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('empleado/editar', $datos);
        echo view('layout/footer');
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == 'post' && $this->validate($this->reglas)) {
            $this->sos_empleado->update($this->request->getPost('id'), [
                'id_tipo' => $this->request->getPost('id_tipo'),
                'id_area' => $this->request->getPost('id_area'),
                'nombres' => $this->request->getPost('nombres'),
                'ap' => $this->request->getPost('ap'),
                'am' => $this->request->getPost('am'),
                'ci' => $this->request->getPost('ci'),
                'tel_fijo' => $this->request->getPost('tel_fijo'),
                'tel_cel' => $this->request->getPost('tel_cel'),
                'direccion' => $this->request->getPost('direccion')
            ]);
            return redirect()->to(base_url() . '/empleado');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }
    public function eliminar($id)
    {
        $this->sos_empleado->update($id, ['estado' => 0]);
        return redirect()->to(base_url() . '/empleado');
    }
    public function agregar_bs()
    {
        $tipos = $this->sos_tipo->where('estado', 1)->findAll();
        $areas = $this->sos_area->where('estado', 1)->findAll();
        $datos = [
            'titulo' => 'Agregar Empleados',
            'tipos' => $tipos,
            'areas' => $areas,

        ];

        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('empleado/agregar_bs', $datos);
        echo view('layout/footer');
    }
    public function buscar()
    {

        $id_tipo = $this->request->getPost('id_tipo');
        $id_area = $this->request->getPost('id_area');
        $nombre = $this->request->getPost('nombres');
        $ap = $this->request->getPost('ap');


        $consulta = $this->sos_empleado->buscar($id_tipo, $id_area, $nombre, $ap);

        $datoss = [
            'titulo' => 'Buscar Empleado',
            'datos' => $consulta,
        ];
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();


        echo view('layout/header', $datos);
        echo view('empleado/buscar', $datoss);
        echo view('layout/footer');
    }
}
