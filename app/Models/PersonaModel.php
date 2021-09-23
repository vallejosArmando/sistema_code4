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

    function make_query()
    {
        $builder = $this->builder($this->table);
        if (isset($_POST["search"]["value"])) {
            $builder->like("nombres", $_POST["search"]["value"]);
            $builder->orlike("ap", $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $builder->orderBy($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $builder->orderBy('id', 'DESC');
        }
    }
    function make_datatables()
    {
        $builder = $this->builder($this->table);

        $this->make_query();
        if ($_POST["length"] != -1) {
            $builder->limit($_POST['length'], $_POST['start']);
        }
        $query = $builder->get();
        return $query->getResult();
    }
    function get_filtered_data()
    {
        $builder = $this->builder($this->table);

        $this->make_query();
        $query = $builder->get()->getRow();
        return $query();
    }
    function get_all_data()
    {
        $builder = $this->builder($this->table);

        $builder->select("*");
        $builder->from($this->table);
        return $builder->countAllResults();
    }

}
