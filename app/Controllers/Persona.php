<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ajax;

use App\Models\AccesoModel;
use App\Models\RolModel;
use App\Models\GrupoModel;
use App\Models\OpcionModel;
use App\Models\SistemaModel;

class Persona extends BaseController
{
    protected $ajax;
    private $sos_acceso;
    private $sos_opcion;
    private $sos_grupo;
    private $sos_rol;
    private $sos_sistema;
    private $reglas;
    public function __construct()
    {
        $this->ajax = new Ajax();
        $this->sos_acceso = new AccesoModel();
        $this->sos_rol = new RolModel();
        $this->sos_grupo = new GrupoModel();
        $this->sos_opcion = new OpcionModel();
        $this->sos_sistema = new SistemaModel();
    }
    public function index()
    {

        $output = '';
        $dato = '';
        if ($this->request->getMethod() == 'post') {
            $dato = $this->request->getPost('datos');
        }
        $data = $this->ajax->data($dato);
        $output .= '
		<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>Customer Name</th>
							<th>Address</th>
							<th>City</th>
							<th>Postal Code</th>
							<th>Country</th>
						</tr>
		'; {
            foreach ($data as $row) {
                $output .= '
						<tr>
							<td>' . $row['ci'] . '</td>
							<td>' . $row['nombres'] . '</td>
							<td>' . $row['ap'] . '</td>
							<td>' . $row['am'] . '</td>
							<td>' . $row['direccion'] . '</td>
						</tr>
				';
            }
        }

        $output .= '</table>';
        echo json_encode($output);
    }
    public function fetch()
    {
        if ($this->request->getMethod() == "post") {

            $idp = $this->request->getPost('id');
            $datoss['datos'] = $this->ajax->data($idp);


            $datos['grupos'] = $this->sos_grupo->where('estado', 1)->findAll();
            $datos['sistem'] = $this->sos_sistema->where('id', 1)->findAll();
            $datos['opciones'] = $this->sos_opcion->where('estado', 1)->findAll();
            $datos['accesos'] = $this->sos_acceso->where('estado', 1)->findAll();
            echo view('layout/header', $datos);
            echo view('persona/ajax', $datoss);
            echo view('layout/footer');
        }
    }
}
