<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\GrupoModel;
use App\Models\sistemaModel;
use App\Models\AccesoModel;
use App\Models\OpcionModel;
class Grupo extends BaseController
{protected $sos_grupo;
    protected $sos_opcion;
    protected $sos_acceso;
    protected $grupo;
    protected $sos_sistema;
    protected $reglas;
    public function __construct()
    {$this->sos_sistema=new SistemaModel();
        $this->sos_acceso=new AccesoModel();
        $this->sos_opcion=new OpcionModel();
        $this->sos_grupo=new GrupoModel();
        $this->grupo = new GrupoModel();
        helper(['form']);
        $this->reglas = [
            'icono' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'grupo' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],

        ];
    }
    public function index()
    {

        $consulta = $this->grupo->where('estado', 1)->findAll();
        $datos = [
            'grupo' => $consulta,
            'titulo' => 'Grupo'
        ];


        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('grupo/inicio', $datos);
        echo view('layout/footer');
    }
    public function agregar()
    {
        $datos = ['titulo' => 'Agregar grupo'];

        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('grupo/agregar', $datos);
        echo view('layout/footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->grupo->save([
                'usuario' => 1,
                'estado' => 1,
                'icono' => $this->request->getPost('icono'),
                'grupo' => $this->request->getPost('grupo'),
            ]);
            return redirect()->to(base_url() . '/grupo');
        } else {
            $datos = [
                'datos' => 'Agregar grupo', 'validation' => $this->validator
            ];

            $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header', $datos);
            echo view('grupo/agregar', $datos);
            echo view('layout/footer');
        }
    }
    public function editar($id, $valid = null)
    {
        $consulta = $this->grupo->where('id', $id)->first();
        if ($valid != null) {
            $matriz = [
                'datos' => $consulta,
                'titulo' => 'Actualizar grupo',
                'validation' => $valid
            ];
        } else {
            $matriz = ['titulo' => 'Editar grupo', 'datos' => $consulta];
        }
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('grupo/editar', $matriz);
        echo view('layout/footer');
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->grupo->update($this->request->getPost('id'), [
                'icono' => $this->request->getPost('icono'),
                'grupo' => $this->request->getPost('grupo')
            ]);
            return redirect()->to(base_url() . '/grupo');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }
    public function eliminar($id)
    {
        $this->grupo->update($id, ['estado' => 0]);
        return redirect()->to(base_url() . '/grupo');
    }
}
