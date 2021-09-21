<?php

namespace App\Controllers;

use App\Models\PersonaModel;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request;
 */

class Persona extends BaseController
{

    public function index()
    {
        return view('persona/ho');
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
}