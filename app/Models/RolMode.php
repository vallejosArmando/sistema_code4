<?php 
namespace App\Models;

use CodeIgniter\Model;

class RolMode

 extends Model{
    protected $table      = 'rol';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['rol','usuario','estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'fec_insercion	';
    protected $updatedField  = 'fec_modificacion';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

public function listar() {
  //   $db=\Config\Database::connect();
  $builder = $this->builder($this->table);
  $builder=$builder->where('estado',1);
  $builder = $builder->get();
  return $builder->getResult();}


}