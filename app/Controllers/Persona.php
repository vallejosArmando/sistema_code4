<?php
namespace App\Controllers;

use App\Models\PersonaModel;
use Config\View;

class Persona extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new PersonaModel();
    }
    public function index()
    {
        $datos['datas'] = $this->model->select('id,ap')->orderBy('ap')->findAll();
        return View('persona/hom', $datos);
    }
}