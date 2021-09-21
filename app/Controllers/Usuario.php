<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\PersonaModel;
use App\Models\RolModel;
use App\Models\UsurolMode;
use App\Models\SistemaModel;
use App\Models\AccesoModel;
use App\Models\OpcionModel;
use App\Models\GrupoModel;


class Usuario extends BaseController
{
    protected $aux_usuario;
    protected $aux_persona;
    protected $aux_rol;
    protected $aux_usr;
    protected $sos_sistema;

    protected $sos_grupo;
    protected $sos_opcion;
    protected $sos_acceso;



    protected $reglas, $reglasLogin, $reglasCambia;
    public function __construct()
    {
        $this->aux_usuario = new UsuarioModel();
        $this->aux_persona = new PersonaModel();
        $this->aux_rol = new RolModel();
        $this->aux_us = new UsurolMode();
        $this->sos_sistema = new SistemaModel();
        $this->sos_acceso = new AccesoModel();
        $this->sos_opcion = new OpcionModel();
        $this->sos_grupo = new GrupoModel();
        helper(['form']);
        $this->reglas = [
            'nom_usuario' => [
                'rules' => 'required|is_unique[usuario.nom_usuario]', 'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' => 'El campo {field} deve ser unico'
                ]
            ],
            'clave' => [
                'rules' => 'required', 'errors' => [
                    'required' => 'el campo {field} es obligatorio.'
                ]
            ],
            'reclave' => [
                'rules' => 'required|matches[clave]',
                'errors' => [
                    'required' => 'el campo {field} es obligatorio.',
                    'matches' => 'Las contrasenas no coinciden'
                ]
            ],

            'id_persona' => [
                'rules' => 'required', 'errors' => [
                    'required' => 'el campo {field} es obligatorio.'
                ]
            ]

        ];
        $this->reglasLogin = [
            'nom_usuario' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'clave' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ]
        ];
        $this->reglasCambia = [
            'clave' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'reclave' => [
                'rules' => 'required|matches[clave]',
                'errors' => [
                    'required' => 'el campo {field} es obligatorio.',
                    'matches' => 'Las contraseñas no coinciden'
                ]
            ]
        ];
    }
    public function index()
    {

        $consulta = $this->aux_usuario->where('estado', 1)->findAll();

        $matriz = ['titulo' => ' Usuarios', 'datos' => $consulta];
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('usuario/inicio', $matriz);
        echo view('layout/footer');
    }
    public function nuevo()
    {

        $personas = $this->aux_persona->where('estado', 1)->findAll();
        $matriz = ['titulo' => 'Agregar usuario', 'personas' => $personas];

        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('usuario/agregar', $matriz);
        echo view('layout/footer');
    }
    public function nuevos()
    {





        $personas = $this->aux_persona->where('estado', 1)->findAll();
        $matriz = ['titulo' => 'Agregar usuario', 'personas' => $personas];

        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('usuario/agregar_bs', $matriz);
        echo view('layout/footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $hash = password_hash($this->request->getPost('clave'), PASSWORD_DEFAULT);
            $this->aux_usuario->save([

                'nom_usuario' => $this->request->getPost('nom_usuario'), 'clave' => $hash,
                'id_persona' => $this->request->getPost('id_persona'),
                'usuario' => 1,
                'estado' => 1
            ]);
            return  redirect()->to(base_url() . '/usuario');
        } else {

            $personas = $this->aux_persona->where('estado', 1)->findAll();
            $matriz = ['titulo' => 'Agregar usuario', 'personas' => $personas, 'validation' => $this->validator];


            $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header', $datos);
            echo view('usuario/agregar_bs', $matriz);
            echo view('layout/footer');
        }
    }
    public function editar($id, $valid = null)
    {
        $consulta = $this->aux_usuario->where('id', $id)->first();
        $personas = $this->aux_persona->where('estado', 1)->findAll();

        if ($valid != null) {
            $matriz = ['titulo' => 'Editar usuario', 'personas' => $personas, 'datos' => $consulta, 'validation' => $valid];
        } else {
            $matriz = ['titulo' => 'Editar usuario', 'personas' => $personas, 'datos' => $consulta];
        }
        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('usuario/editar', $matriz);
        echo view('layout/footer');
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $this->aux_usuario->update($this->request->getPost('id'), [
                'nom_usuario' => $this->request->getPost('nom_usuario'),
                'clave' => password_hash($this->request->getPost('clave'), PASSWORD_DEFAULT),

                'id_persona' => $this->request->getPost('id_persona')

            ]);
            return  redirect()->to(base_url() . '/usuario');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }
    public function eliminar($id)
    {
        $this->aux_usuario->update($id, ['estado' => 0]);
        return  redirect()->to(base_url() . '/usuario');
    }
    public function eliminados($estado = 0)
    {
        $aux_usuario = $this->aux_usuario->where('estado', $estado)->findAll();
        $personas = $this->aux_persona->where('estado', $estado)->findAll();
        $matriz = ['titulo' => 'Eliminados', 'datos' => $aux_usuario];

        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('usuario/eliminados', $matriz);
        echo view('layout/footer');
    }
    public function activar($id)
    {

        $this->aux_usuario->update($id, ['estado' => 1]);
        return  redirect()->to(base_url() . '/usuario');
    }
    public function login()
    {

        echo view('login');
    }
    public function validar()
    {

        if ($this->request->getMethod() == "post"  && $this->validate($this->reglasLogin)) {

            $nom_usuario = $this->request->getPost('nom_usuario');
            $clave = $this->request->getPost('clave');
            $datos = $this->aux_us->login($nom_usuario, $clave);
            if ($datos != null) {

                if (
                    count($datos) > 0 &&
                    password_verify($clave, $datos[0]['clave'])
                ) {
                    $datosSession = [

                        'usuario' => $datos[0]['nom_usuario'],
                        'rol' => $datos[0]['rol'],
                        'id_rol' => $datos[0]['id_rol'],
                        'id_usuario' => $datos[0]['id_usuario']

                    ];
                    $session = session();
                    $session->set($datosSession);
                    return redirect()->to(base_url() . '/menu');
                } else {
                    $data['error'] = "Las contrasenas no coinsiden ";
                    echo view('login', $data);
                }
            } else {
                $data['error'] = "El usuario no existe";
                echo view('login', $data);
            }
        } else {


            $data = ['validation' => $this->validator];
            echo view('login', $data);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }
    public function cambiar_password()
    {
        $session = session();
        $usuario = $this->aux_usuario->where('id', $session->id_usuario)->first();
        $matriz = ['titulo' => 'Cambiar password', 'usuario' => $usuario];

        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('usuario/cambiarPassword', $matriz);
        echo view('layout/footer');
    }
    public function actualizar_password()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglasCambia)) {

            $session = session();
            $idUsuario = $session->id_usuario;

            $hash = password_hash($this->request->getPost('clave'), PASSWORD_DEFAULT);
            $this->aux_usuario->update($idUsuario, ['clave' => $hash]);
            $usuario = $this->aux_usuario->where('id', $session->id_usuario)->first();
            $matriz = ['titulo' => 'Cambiar password', 'usuario' => $usuario, 'mensaje' => 'Conotraseña actualizada'];
            $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header', $datos);
            echo view('usuario/v_cambiar_password', $matriz);
            echo view('layout/footer');
        } else {

            $session = session();
            $usuario = $this->aux_usuario->where('id', $session->id_usuario)->first();
            $matriz = ['titulo' => 'Cambiar contraseña', 'usuario' => $usuario, 'validation' => $this->validator];
            $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header', $datos);
            echo view('usuario/v_cambiar_password', $matriz);
            echo view('layout/footer');
        }
    }
    public function agregar_bs()
    {
        $personas = $this->aux_persona->where('estado', 1)->findAll();
        $matriz = ['titulo' => 'Agregar usuario', 'personas' => $personas];

        $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header', $datos);
        echo view('usuario/agregar_bs', $matriz);
        echo view('layout/footer');
    }
}
