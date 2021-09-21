<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReclamoConfModel;
use App\Models\ReclamoModel;
use App\Models\SistemaModel;
use App\Models\AccesoModel;
use App\Models\OpcionModel;
use App\Models\GrupoModel;


class Reclamo_conf extends BaseController
{
    protected $sos_grupo;
    protected $sos_opcion;
    protected $sos_acceso;
    protected $sos_reclamo_conf;
    protected $sos_reclamo;
    protected $sos_sistema;
    protected $reglas;
    public function __construct()
    {
        $this->sos_sistema = new SistemaModel();
        $this->sos_acceso=new AccesoModel();
        $this->sos_opcion=new OpcionModel();
        $this->sos_grupo=new GrupoModel();
        $this->sos_reclamo = new ReclamoModel();
        $this->sos_reclamo_conf = new ReclamoConfModel();
        $this->reglas = [

            'id_reclamo' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'nombres' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'ap' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'am' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'telefono' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'correo' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'codigo_usuario' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'barrio' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'calle_avenida' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'entre_que_calles' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'numero_de_casa' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'referencias' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'descripcion_del_reclamo' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],

            'map' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'otro_recurrente' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'telefono_del_recurrente' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']],
            'tipo_de_calzada' => ['rules' => 'required', 'errors' => ['required' => 'El campo {field} es obligatorio.']]

        ];
    }



    public function index()
    {
        $consultas = $this->sos_reclamo_conf->listar();

        $datos = [
            'titulo' => 'Tabla Reclamos',
            'datos' => $consultas
        ];

        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('reclamo_conf/inicio', $datos);
        echo view('layout/footer');
    }
    public function agregar()
    {
        $reclamos = $this->sos_reclamo->where('estado', 1)->findAll();

        $datos = [
            'titulo' => 'Agregar Reclamos',
            'reclamos' => $reclamos
        ];
        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('reclamo_conf/agregar', $datos);
        echo view('layout/footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->sos_reclamo_conf->save([
                'id_reclamo' => $this->request->getPost('id_reclamo'),

                'nombres' => $this->request->getPost('nombres'),
                'ap' => $this->request->getPost('ap'),
                'am' => $this->request->getPost('am'),
                'telefono' => $this->request->getPost('telefono'),
                'correo' => $this->request->getPost('correo'),
                'codigo_usuario' => $this->request->getPost('codigo_usuario'),
                'barrio' => $this->request->getPost('barrio'),
                'calle_avenida' => $this->request->getPost('calle_avenida'),
                'entre_que_calles' => $this->request->getPost('entre_que_calles'),
                'numero_de_casa' => $this->request->getPost('numero_de_casa'),
                'referencias' => $this->request->getPost('referencias'),
                'descripcion_del_reclamo' => $this->request->getPost('descripcion_del_reclamo'),
                'fotos' => $this->request->getPost('fotos'),

                'map' => $this->request->getPost('map'),
                'otro_recurrente' => $this->request->getPost('otro_recurrente'),
                'telefono_del_recurrente' => $this->request->getPost('telefono_del_recurrente'),
                'tipo_de_calzada' => $this->request->getPost('tipo_de_calzada'),
                'usuario' => 1,
                'estado' => 1


            ]);
            return redirect()->to(base_url() . '/reclamo_conf');
        } else {
            $reclamos = $this->sos_reclamo->where('estado', 1)->findAll();

            $datos = ['titulo' => 'Agregar Reclamos', 'reclamos' => $reclamos,  'validation' => $this->validator];
            $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header',$datos);
            echo view('reclamo_conf/agregar', $datos);
            echo view('layout/footer');
        }
    }
    public function editar($id, $valid = null)
    {
        $consultas = $this->sos_reclamo_conf->where('id', $id)->first();
        $reclamos = $this->sos_reclamo->where('estado', 1)->findAll();

        if ($valid != null) {
            $datos = [
                'titulo' => 'Editar Reclamo',
                'datos' => $consultas,
                'reclamos' => $reclamos,
                'validator' => $this->valid
            ];
        } else {
            $datos = [
                'titulo' => 'Editar Reclamo',
                'datos' => $consultas,
                'reclamos' => $reclamos

            ];
        }

        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('reclamo_conf/editar', $datos);
        echo view('layout/footer');
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == 'post' && $this->validate($this->reglas)) {
            $this->sos_reclamo_conf->update($this->request->getPost('id'), [
                'id_reclamo' => $this->request->getPost('id_reclamo'),

                'nombres' => $this->request->getPost('nombres'),

                'ap' => $this->request->getPost('ap'),
                'am' => $this->request->getPost('am'),
                'telefono' => $this->request->getPost('telefono'),
                'correo' => $this->request->getPost('correo'),
                'codigo_usuario' => $this->request->getPost('codigo_usuario'),
                'barrio' => $this->request->getPost('barrio'),
                'calle_avenida' => $this->request->getPost('calle_avenida'),
                'entre_que_calles' => $this->request->getPost('entre_que_calles'),
                'numero_de_casa' => $this->request->getPost('numero_de_casa'),
                'referencias' => $this->request->getPost('referencias'),
                'descripcion_del_reclamo' => $this->request->getPost('descripcion_del_reclamo'),
                'fotos' => $this->request->getPost('fotos'),

                'map' => $this->request->getPost('map'),
                'otro_recurrente' => $this->request->getPost('otro_recurrente'),
                'telefono_del_recurrente' => $this->request->getPost('telefono_del_recurrente'),
                'tipo_de_calzada' => $this->request->getPost('tipo_de_calzada'),
            ]);
            return redirect()->to(base_url() . '/reclamo_conf');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }
    public function eliminar($id)
    {
        $this->sos_reclamo_conf->update($id, ['estado' => 0]);
        return redirect()->to(base_url() . '/reclamo_conf');
    }
}
