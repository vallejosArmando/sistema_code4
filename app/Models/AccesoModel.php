<?php 
namespace App\Models;

use CodeIgniter\Model;

class AccesoModel extends Model{
    protected $table      = 'acceso';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id';
     protected $allowedFields = ['id_opcion','id_grupo','id_rol','permisos','usuario','estado'];
     public function listar()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->where('acceso.estado', 1);
        $builder = $builder->join('opcion', 'acceso.id_opcion = opcion.id');
        $builder = $builder->join('grupo', 'acceso.id_grupo = grupo.id');
        $builder = $builder->join('rol', 'acceso.id_rol = rol.id');
        $builder = $builder->select('opcion.nombre, grupo.grupo, rol.rol,acceso.id_opcion,acceso.id_rol,acceso.id_grupo, acceso.*');

        $builder = $builder->get();
        return $builder->getResultArray();
    }
    public function buscar($id_grupo, $id_opcion, $id_rol)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->where('acceso.estado', 1);

        $builder = $builder->join('opcion', 'acceso.id_opcion = opcion.id');
        $builder = $builder->join('grupo', 'acceso.id_grupo = grupo.id');
        $builder = $builder->join('rol', 'acceso.id_rol = rol.id');
        $builder = $builder->like(['grupo.grupo' => $id_grupo]);

        $builder = $builder->like(['opcion.nombre' => $id_opcion]);
        $builder = $builder->like(['rol.rol' => $id_rol]);


        $builder = $builder->get()->getResultArray();
        if ($builder > 0) {
            return $builder;
        } else {
            return false;
        }
    }
}