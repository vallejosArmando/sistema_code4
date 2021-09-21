<?php 

namespace App\Controllers;
use Codeinert\Controller;
use App\Models\AreaModel;
use App\Models\SistemaModel;
use App\Models\AccesoModel;
use App\Models\OpcionModel;
use App\Models\GrupoModel;
class  Reporte_area_fecha extends BaseController{
    protected $fecha ;
    protected $sos_grupo;
    protected $sos_opcion;
    protected $sos_acceso;
       protected $sos_sistema;
    protected $sos_area;
    public function __construct(){
        $this->sos_area = new AreaModel();
        $this->sos_sistema = new SistemaModel();
        $this->sos_sistema=new SistemaModel();
        $this->sos_acceso=new AccesoModel();
        $this->sos_opcion=new OpcionModel();
        $this->sos_grupo=new GrupoModel();
    }
    public function index(){
        $datos= ['titulo' => 'Reporte '];
        $datos['datos']=$this->sos_area->where('estado')->findAll();
        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('reporte/rep_area_fecha', $datos);
        echo view('layout/footer');
    }
    public function listar(){
        if($this->request->getMethod() == 'POST'){
           $f1=$this->request->getPost('f1');
           $f2=$this->request->getPost('f2');

           $datos=$this->sos_area->fecha($f1,$f2);
$matriz=[
    'datoss'=>$datos,
];
           $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('reporte/rep_area_fecha', $matriz);
        echo view('layout/footer');
    } else {
        $datos = ['titulo' => 'Reporte '];

        $datos['grupos']= $this->sos_grupo->where('estado', 1)->findAll();
        $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
        $datos['opciones']=$this->sos_opcion->where('estado', 1)->findAll();
        $datos['accesos']=$this->sos_acceso->where('estado', 1)->findAll();
        echo view('layout/header',$datos);
        echo view('reporte/rep_area_fecha', $datos);
        echo view('layout/footer');
    }}

}