<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\SistemaModel;
use App\Models\AccesoModel;
use App\Models\OpcionModel;
use App\Models\GrupoModel;
use App\Models\RolModel;




class Menu extends BaseController
{

protected $sos_grupo;
protected $sos_opcion;
protected $sos_acceso;
   protected $sos_sistema;
   protected $sos_rol;


public function __construct(){


$this->sos_sistema=new SistemaModel();
$this->sos_acceso=new AccesoModel();
$this->sos_opcion=new OpcionModel();
$this->sos_grupo=new GrupoModel();
$this->sos_rol=new RolModel();
$session=session();


}

    public function index()
    {
        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo   view('menu/inicio');
       echo view('layout/footer');

    }
  

}

