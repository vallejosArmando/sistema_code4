<?php

namespace App\Models;

use CodeIgniter\Model;

class Ajax extends Model
{
    protected $table      = 'persona';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['ci', 'nombres', 'ap', 'am', 'direccion', 'telefono', 'id_sistema', 'genero', 'usuario', 'estado'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function data($idp)
    {       // $query=$builder = $this->db->table('persona');
        $builder = $this->builder($this->table);

        $query = $builder->select("*");
        $query = $builder->where("id", $idp); {
            $query = $builder->like('ci', $idp);
            $query = $builder->like('nombres', $idp);
            $query = $builder->like('ap', $idp);
            $query = $builder->like('am', $idp);
            $query = $builder->like('direccion', $idp);
            $query = $builder->orderBy('id', 'DESC');
            $query = $builder->get();
            return $query->getResultArray();
        }
    }
}
