<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniterController;
use CodeIgniter\HTTPRequestInterface;
use App\Models\PersonaModel;
use App\Models\SistemaModel;
use App\Models\AccesoModel;
use App\Models\OpcionModel;
use App\Models\GrupoModel;

class Persona extends BaseController
{
    protected $sos_grupo;
    protected $sos_opcion;
    protected $sos_acceso;
    protected $sos_persona;
    protected $sos_sistema;
    protected $reglas;
    public function __construct()
    {
        $this->sos_sistema = new SistemaModel();
        $this->sos_acceso = new AccesoModel();
        $this->sos_opcion = new OpcionModel();
        $this->sos_grupo = new GrupoModel();
        $this->sos_persona = new PersonaModel();
        helper(['form']);
        $this->reglas = [
            'ci' => [
                'rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']
            ],
            'nombres' => [
                'rules' => 'required', 'errors' => [
                    'required' => 'el campo {field} es obligatorio.'
                ]
            ],
            'ap' => [
                'rules' => 'required', 'errors' => [
                    'required' => 'el campo {field} es obligatorio.'
                ]
            ],
            'am' => [
                'rules' => 'required', 'errors' => [
                    'required' => 'el campo {field} es obligatorio.'
                ]
            ],
            'telefono' => [
                'rules' => 'required', 'errors' => [
                    'required' => 'el campo {field} es obligatorio.'
                ]
            ],
            'direccion' => [
                'rules' => 'required', 'errors' => [
                    'required' => 'el campo {field} es obligatorio.'
                ]
            ],
            'genero' => [
                'rules' => 'required', 'errors' => [
                    'required' => 'el campo {field} es obligatorio.'
                ]
            ]
        ];
    }
    public function index()
    {

        $datos['datos'] = $this->sos_persona->where('estado', 1)->findAll();
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();

        echo view('layout/header', $datos);
        echo view('persona/inicio', $datos);
        echo view('layout/footer');
    }



    public function agregar()
    {
        $matriz = ['titulo' => 'Agregar persona'];

        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('persona/agregar', $matriz);
        echo view('layout/footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->sos_persona->save([
                'ci' => $this->request->getPost('ci'),
                'nombres' => $this->request->getPost('nombres'),
                'ap' => $this->request->getPost('ap'),
                'am' => $this->request->getPost('am'),

                'telefono' => $this->request->getPost('telefono'),
                'direccion' => $this->request->getPost('direccion'),
                'genero' => $this->request->getPost('genero'),
                'usuario' => 1,
                'estado' => 1,
                'id_sistema' => 1

            ]);
            return  redirect()->to(base_url() . '/persona');
        } else {
            $matriz = ['titulo' => 'Agregar persona', 'validation' => $this->validator];
            $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header', $datos);
            echo view('persona/agregar', $matriz);
            echo view('layout/footer');
        }
    }
    public function editar($id, $valid = null)
    {
        $consulta = $this->sos_persona->where('id', $id)->first();

        if ($valid != null) {
            $matriz = ['titulo' => 'Editar persona', 'datos' => $consulta, 'validation' => $valid];
        } else {
            $matriz = ['titulo' => 'Editar persona', 'datos' => $consulta];
        }
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('persona/editar', $matriz);
        echo view('layout/footer');
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $this->sos_persona->update($this->request->getPost('id'), [
                'ci' => $this->request->getPost('ci'),

                'nombres' => $this->request->getPost('nombres'),
                'ap' => $this->request->getPost('ap'),
                'am' => $this->request->getPost('am'),

                'telefono' => $this->request->getPost('telefono'),
                'direccion' => $this->request->getPost('direccion'),
                'genero' => $this->request->getPost('genero')
            ]);
            return  redirect()->to(base_url() . '/persona');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }
    public function eliminar($id)
    {
        $this->sos_persona->update($id, ['estado' => 0]);
        return  redirect()->to(base_url() . '/persona');
    }
    public function buscar()
    {

        $idp = $this->request->getPost('nombres');
        $ap = $this->request->getPost('ap');
        $am = $this->request->getPost('am');

        $datoss['datos'] = $this->sos_persona->buscar($idp, $ap, $am);


        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();


        echo view('layout/header', $datos);
        echo view('persona/buscar', $datoss);
        echo view('layout/footer');
    }
    public function buscarr()
    {
        $idp = $this->request->getPost('nombres');
        $ap = $this->request->getPost('ap');
        $am = $this->request->getPost('am');

        $datoss['datos'] = $this->sos_persona->buscar($idp, $ap, $am);


        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();


        echo view('layout/header', $datos);
        echo view('usuario/agregar_bs', $datoss);
        echo view('layout/footer');
    }
}
