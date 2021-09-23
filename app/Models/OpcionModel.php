<?php 
namespace App\Models;

use CodeIgniter\Model;

class OpcionModel extends Model{
    protected $table      = 'opcion';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id';
     protected $allowedFields = ['id_grupo','op_url','nombre','mostrar','orden','usuario','estado'];
     public function listar()
     {
         $builder = $this->builder($this->table);
 
         $builder = $builder->where('opcion.estado', 1);
         $builder = $builder->join('grupo', 'opcion.id_grupo = grupo.id');
         $builder = $builder->select('grupo.grupo, opcion.id_grupo, opcion.*');
 
         $builder = $builder->get();
         return $builder->getResultArray();
     }
    public function buscar($id_grupo, $nombre, $op_url)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->where('opcion.estado', 1);

        $builder = $builder->join('grupo', 'acceso.id_grupo = grupo.id');
        $builder = $builder->like(['grupo.grupo' => $id_grupo]);

        $builder = $builder->like(['opcion.nombre' => $nombre]);
        $builder = $builder->like(['opcion.op_url' => $op_url]);

        $builder = $builder->get()->getResultArray();
        if ($builder > 0) {
            return $builder;
        } else {
            return false;
        }
    }
 
}