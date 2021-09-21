<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request;
 */

class Persona extends BaseController
{


    public function index()
    {
        return view('persona/home');
    }

    public function select()
    {


        if ($this->request->isAJAX()) {
            $persona = $this->request->getGet('search');


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
    public function listAp()
    {
        if ($this->request->isAJAX()) {
            $ap = $this->request->getVar('ap');
            $datos = $this->$this->db->table('persona')
                ->where('ap', $ap)->get();
            $data = "";
            foreach ($datos->getResultArray() as $row) :
                $data .= '<option value="' . $row['id'] . '" >' . $row['ap'] . '</option>';

            endforeach;
            $msg = [
                'data' => $data,
            ];
            echo json_encode($msg);
        }
    }
}
