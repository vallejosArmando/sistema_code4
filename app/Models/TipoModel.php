<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoModel extends Model
{
    protected $table      = 'tipo_empleado';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'usuario', 'estado'];
    public function buscar($nombre, $descripcion)
    {
        $builder = $this->builder($this->table);

        $builder = $builder->like(['nombre' => $nombre]);
        $builder = $builder->like(['descripcion' => $descripcion]);


        $builder = $builder->get()->getResultArray();
        if ($builder > 0) {
            return $builder;
        } else {
            return false;
        }
    }
}
