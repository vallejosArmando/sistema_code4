<?php

namespace App\Models;

use CodeIgniter\Model;

class AreaModel extends Model
{
    protected $table      = 'area';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_sistema', 'nombre', 'descripcion', 'usuario', 'estado'];
    public function fecha($f1, $f2)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->select('fec_insercion');
        $builder = $builder->from('area');
        $builder = $builder->where(['fec_insercion' => $f1]);
        $builder = $builder->where(['fec_insercion' => $f2]);
        return $builder->get()->getResultArray();
    }
    public function buscar($nombre)
    {
        $builder = $this->builder($this->table);

        $builder = $builder->like(['id' => $nombre]);



        $builder = $builder->get()->getResultArray();
        if ($builder > 0) {
            return $builder;
        } else {
            return false;
        }
    }
    public function datos($id_area)
    {
        $builder = $this->builder($this->table);

        $builder = $builder->like(['nombre' => $id_area]);


        $builder = $builder->get()->getResultArray();
        if ($builder > 0) {
            return $builder;
        } else {
            return false;
        }
    }
}
