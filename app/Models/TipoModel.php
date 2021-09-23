<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoModel extends Model
{
    protected $table      = 'tipo_empleado';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'usuario', 'estado'];
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
    public function data($nombre)
    {
        $builder = $this->builder($this->table);

        $builder = $builder->like(['nombre' => $nombre]);


        $builder = $builder->get()->getResultArray();
        if ($builder > 0) {
            return $builder;
        } else {
            return false;
        }
    }
}
