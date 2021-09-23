<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\UsuarioModel;
use App\Models\RolModel;
use App\Models\UsurolModel;
use App\Models\UsurolMode;
use App\Models\SistemaModel;
use App\Models\AccesoModel;
use App\Models\OpcionModel;
use App\Models\GrupoModel;

class Usurol extends BaseController
{
    private $model;
    protected $sos_grupo;
    protected $sos_opcion;
    protected $sos_acceso;
    protected $aux_usuario;
    protected $aux_usurol;
    protected $aux_rol;
    protected $aux_usr;
    protected $sos_sistema;

    protected $reglas;
    public function __construct()
    {
        $this->sos_sistema = new SistemaModel();
        $this->aux_rol = new RolModel();
        $this->aux_usurol = new UsurolModel();
        $this->aux_usuario = new UsuarioModel();
        $this->aux_usr = new UsurolMode();
        $this->sos_acceso=new AccesoModel();
        $this->sos_opcion=new OpcionModel();
        $this->sos_grupo=new GrupoModel();

        helper(['form']);
        $this->reglas = [
            'id_rol' => [
                'rules' => 'required|is_unique[usurol.id_rol]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' => 'El campo {field} ya existe y es unico.',

                ]
            ],
            'id_usuario' => [
                'rules' => 'required', 'errors' => [
                    'required' => 'el campo {field} es obligatorio.'
                ]
            ]


        ];
    }


    public function index()
    {

        $consulta = $this->aux_usurol->listar();
        $matriz = ['titulo' => ' Usuarios Roles', 'datos' => $consulta];

        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('usurol/inicio', $matriz);
        echo view('layout/footer');
    }
    public function nuevo()
    {
        $usuarios = $this->aux_usuario->where('estado', 1)->findAll();

        $roles = $this->aux_rol->where('estado', 1)->findAll();

        $matriz = ['titulo' => 'Agregar usuario rol', 'usuarios' => $usuarios, 'roles' => $roles];
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('usurol/agregar', $matriz);
        echo view('layout/footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post"  && $this->validate($this->reglas)) {
            $this->aux_usurol->save([
                'estado' => 1,
                'usuario' => 1,
                'id_rol' => $this->request->getPost('id_rol'),
                'id_usuario' => $this->request->getPost('id_usuario')



            ]);
            return  redirect()->to(base_url() . '/usurol');
        } else {
            $usuarios = $this->aux_usuario->where('estado', 1)->findAll();

            $roles = $this->aux_rol->where('estado', 1)->findAll();

            $matriz = ['titulo' => 'Agregar usuario rol', 'usuarios' => $usuarios, 'roles' => $roles, 'validation' => $this->validator];

            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            echo view('layout/header', $datos);
            echo view('usurol/agregar', $matriz);
            echo view('layout/footer');
        }
    }
    public function editar($id, $valid = null)
    {
        $consulta = $this->aux_usurol->where('id', $id)->first();

        $usuarios = $this->aux_usuario->where('estado', 1)->findAll();
        $roles = $this->aux_rol->where('estado', 1)->findAll();

        if ($valid != null) {
            $matriz = ['titulo' => 'Editar Usuario Rol', 'datos' => $consulta, 'usuarios' => $usuarios, 'roles' => $roles, 'validation' => $valid];
        } else {
            $matriz = ['titulo' => 'Editar Usuario Rol', 'usuarios' => $usuarios, 'roles' => $roles, 'datos' => $consulta];
            $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header', $datos);
            echo view('usurol/editar', $matriz);
            echo view('layout/footer');
        }
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->aux_usurol->update($this->request->getPost('id'), [
                'id_rol' => $this->request->getPost('id_rol'),
                'id_usuario' => $this->request->getPost('id_usuario'),


            ]);

            return  redirect()->to(base_url() . '/usurol');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }
    public function eliminar($id)
    {
        $this->aux_usurol->update($id, ['estado' => 0]);
        return  redirect()->to(base_url() . '/usurol');
    }
    public function eliminados($estado = 0)
    {
        $consulta = $this->aux_usurol->where('estado', $estado)->findAll();
        $matriz = ['titulo' => 'Eliminados', 'datos' => $consulta];
        echo view('usurol/eliminados', $matriz);
        echo view('layout/footer');
    }
    public function activar($id)
    {

        $this->aux_usurol->update($id, ['estado' => 1]);
        return  redirect()->to(base_url() . '/usurol');
    }
}
