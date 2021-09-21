<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonaModel
extends Model
{
    protected $table      = 'persona';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['ci', 'nombres', 'ap', 'am', 'direccion', 'telefono', 'id_sistema', 'genero', 'usuario', 'estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'fec_insercion';
    protected $updatedField  = 'fec_modificacion';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function buscar($idp, $ap, $am)
    {
        $builder = $this->builder($this->table);
        $builder = $builder->like(['nombres' => $idp]);

        $builder = $builder->like(['ap' => $ap]);
        $builder = $builder->like(['am' => $am]);


        $builder = $builder->get()->getResultArray();
        if ($builder > 0) {
            return $builder;
        } else {
            return false;
        }

    }
    public function listar()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->where('estado', 1);


        $builder = $builder->select('*');

        $builder = $builder->get();
        return $builder->getResult();
    }
}
