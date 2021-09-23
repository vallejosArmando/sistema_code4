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
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request;
 */
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


    public function select()
    {


        if ($this->request->isAJAX()) {
            $persona = $this->request->getGet('nombres');


            //$db = \Config\Database::connect();
            $datos = $this->db->table('persona')
            ->like('nombres', $persona)->get();
            if ($datos->getNumRows() > 0) {
                $list = [];
                $key = 0;
                foreach ($datos->getResultArray() as $row) :
                    $list[$key]['id'] = $row['id'];
                    $list[$key]['text'] = $row['nombres'];
                    $key++;
                endforeach;


                echo json_encode($list);
            }
        }
    }
    public function selectap()
    {


        if ($this->request->isAJAX()) {
            $persona = $this->request->getGet('ap');


            //$db = \Config\Database::connect();
            $datos = $this->db->table('persona')
            ->like('ap', $persona)->get();
            if ($datos->getNumRows() > 0) {
                $list = [];
                $key = 0;
                foreach ($datos->getResultArray() as $row) :
                    $list[$key]['id'] = $row['id'];
                    $list[$key]['text'] = $row['ap'];
                    $key++;
                endforeach;


                echo json_encode($list);
            }
        }
    }
    public function selectam()
    {


        if ($this->request->isAJAX()) {
            $persona = $this->request->getGet('am');


            //$db = \Config\Database::connect();
            $datos = $this->db->table('persona')
            ->like('am', $persona)->get();
            if ($datos->getNumRows() > 0) {
                $list = [];
                $key = 0;
                foreach ($datos->getResultArray() as $row) :
                    $list[$key]['id'] = $row['id'];
                    $list[$key]['text'] = $row['am'];
                    $key++;
                endforeach;


                echo json_encode($list);
            }
        }
    }
    function indexx()
    {
        $data["title"] = "Codeigniter Ajax CRUD with Data Tables and Bootstrap Modals";
        echo view('crud_view', $data);
    }
    function fetch_user()
    {
        $fetch_data =  $this->sos_persona->make_datatables();
        $data = array();
        foreach ($fetch_data as $row) {
            $sub_array = array();

            $sub_array[] = $row->nombres;
            $sub_array[] = $row->ap;
            $sub_array[] = '<button type="button" name="update" id="' . $row->id . '" class="btn btn-warning btn-xs">Update</button>';
            $sub_array[] = '<button type="button" name="delete" id="' . $row->id . '" class="btn btn-danger btn-xs">Delete</button>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                    =>     intval($_POST["draw"]),
            "recordsTotal"          =>       $this->sos_persona->get_all_data(),
            "recordsFiltered"     =>      $this->sos_persona->get_filtered_data(),
            "data"                    =>     $data
        );
        echo json_encode($output);
    }
    public function getPersona()
    {

        if ($this->request->isAJAX()) {
            $persona = $this->request->getGet('data');


            //$db = \Config\Database::connect();
            $datos = $this->db->table('persona')
            ->like('ap', $persona)->get();
            if ($datos->getNumRows() > 0) {
                $list = [];
                $key = 0;
                foreach ($datos->getResultArray() as $row) :
                    $list[$key]['id'] = $row['id'];
                    $list[$key]['text'] = $row['nombres'];
                    $key++;
                endforeach;


                echo json_encode($list);
            }
        }
    }
}
