<?php 
namespace App\Models;

use CodeIgniter\Model;

class EmpleadoModel extends Model{
    protected $table      = 'empleado';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id';
     protected $allowedFields=['id_tipo','id_area','id_sistema','nombres','ap','am','ci','tel_fijo','tel_cel','direccion','usuario','estado'];

     public function listar()
     {
         $builder = $this->builder($this->table);
 
         $builder = $builder->where('empleado.estado', 1);
         $builder = $builder->join('tipo_empleado', 'empleado.id_tipo = tipo_empleado.id');
         $builder = $builder->join('area', 'empleado.id_area = area.id');
         $builder = $builder->select('area.nombre as nomb, tipo_empleado.nombre, empleado.id_tipo,empleado.id_area, empleado.*');
 
         $builder = $builder->get();
         return $builder->getResultArray();
     }
    public function datos($id_tipo, $id_area)
    {
        $builder = $this->builder($this->table);

        $builder = $builder->where('empleado.estado', 1);
        $builder = $builder->join('tipo_empleado', 'empleado.id_tipo = tipo_empleado.id');
        $builder = $builder->join('area', 'empleado.id_area = area.id');
        $builder = $builder->select('area.nombre as nomb, tipo_empleado.nombre, empleado.id_tipo,empleado.id_area, empleado.*');
        $builder = $builder->like(['tipo_empleado.id' => $id_tipo]);
        $builder = $builder->like(['tipo_empleado.nombre' => $id_tipo]);


        $builder = $builder->like(['area.id' => $id_area]);
        $builder = $builder->like(['area.nombre' => $id_area]);

        $builder = $builder->get()->getResultArray();
        if ($builder > 0) {
            return $builder;
        } else {
            return false;
        }
    }
 
}