<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\SistemaModel;
use App\Models\AccesoModel;
use App\Models\OpcionModel;
use App\Models\GrupoModel;
class Sistema extends BaseController
{protected $sos_grupo;
    protected $sos_opcion;
    protected $sos_acceso;
       protected $sos_sistema;
    public function __construct(){
        $this->sos_sistema=new SistemaModel();
$this->sos_acceso=new AccesoModel();
$this->sos_opcion=new OpcionModel();
$this->sos_grupo=new GrupoModel();
    }

    public function index()
    {
        $datos['sistema'] = $this->sos_sistema->where('estado', 1)->findAll();
        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('sistema/listar',$datos);
       echo view('layout/footer');
    }
    public function agregar()
    {
        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('sistema/agregar',$datos);
       echo view('layout/footer');
    }
    public function guardar()
    {
        $sistema = new SistemaModel();

        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]',
            'nombre_creador' => 'required|min_length[3]',

            'logo' => [
                'uploaded[logo]',
                'mime_in[logo,image/jpg,image/jpeg,image/png]',
                'max_size[logo,1024]',]
        ]);
        if (!$validacion) {
            $session = session();
            $session->setflashdata('mensaje', 'Revise la informacion');
          //  return redirect()->back()->withInput();
            return redirect()->to(base_url().'/agregar');
            /*  return $this->response->redirect( base_url('/listar'));*/
        }
        if ($logo = $this->request->getFile('logo')) {
            $nuevoNombre = $logo->getRandomName();
            $logo->move('../public/fotos/', $nuevoNombre);
            $datos = [
                'nombre' => $this->request->getVar('nombre'),
                'nombre_creador' => $this->request->getVar('nombre_creador'),
                'logo' => $nuevoNombre,
                'usuario' => 1,
                'estado' => 1
            ];
            $sistema->insert($datos);
        }
        //return $this->response->redirect(site_url('/listar'));
        return redirect()->to(base_url().'/listar');

    }
    public function editar($id = null)
    {
        
        /* print_r($id);*/
        $datos['sistema'] = $this->sos_sistema->where('id', $id)->first();
        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('sistema/editar',$datos);
       echo view('layout/footer');
    }
    public function actualizar()
    {
        $sistema = new SistemaModel();
        $datos = [
            'nombre' => $this->request->getVar('nombre'),
            'nombre_creador' => $this->request->getVar('nombre_creador')
        ];
        $id = $this->request->getVar('id');
        
        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]',
            'nombre_creador' => 'required|min_length[3]',]);

        if (!$validacion) {
            $session = session();
            $session->setflashdata('mensaje', 'Revise la informacion');
        return redirect()->back()->withInput();
    


        }
        $sistema->update($id, $datos);
        
        
        $validacion = $this->validate([
            
            'logo' => [
                'uploaded[logo]',
                'mime_in[logo,image/jpg,image/jpeg,image/png]',
                'max_size[logo,1024]',]]);
            
            if ($validacion) {
                
                if ($logo = $this->request->getFile('logo')) {
                    $datosSistema = $sistema->where('id', $id)->first();
                    $ruta = ('../public/fotos/' . $datosSistema['logo']);
                    unlink($ruta);
                    $nuevoNombre = $logo->getRandomName();
                    $logo->move('../public/fotos/', $nuevoNombre);
                    $datos = [ 
                        'logo' => $nuevoNombre ];
                    $sistema->update($id, $datos);
                }
            }
            //return $this->response->redirect(base_url('/listar'));
            return redirect()->to(base_url().'/listar');

        }
        public function borrar($id = null)
        {
            //$datosSistema = $sistema->where('id', $id)->first();
            /*$ruta=('../public/fotos/'.$datosSistema['logo']);
         unlink($ruta);*/
            $this->sos_sistema->where('id', $id)->update($id, ['estado' => 0]);
           // return $this->response->redirect(base_url('/listar'));
           return redirect()->to(base_url().'/listar');

        }public function get($id=1){
            $sistema = new SistemaModel();
            $datos['sist'] = $sistema->where('id', $id)->first();
            return view('layout/header', $datos);
        }
}
