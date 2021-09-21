<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel
 extends Model{
    protected $table      = 'usuario';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nom_usuario', 'clave','id_persona','usuario','estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'fec_insercion';
    protected $updatedField  = 'fec_modificacion';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function login($nom_usuario, $clave){
        // $db=\Config\Database::connect();
         $builder = $this->builder($this->table);
 
         //    $builder = $builder = $db->table('usurol');
             $builder = $builder->select('u.nom_usuario');
             $builder = $builder->select('u.clave');
             $builder = $builder->select('u.id');
 
             $builder = $builder->select('r.rol');
             $builder = $builder->select('r.id');
 
             $builder = $builder->select('usr.id_rol');
             $builder = $builder->select('usr.id_usuario');
 
             $builder = $builder->from('usurol usr');
             $builder = $builder->join('rol  r', 'usr.id_rol = r.id');
             $builder = $builder->join('usuario  u', 'usr.id_usuario = u.id');
             $builder = $builder->Where(['nom_usuario'=> $nom_usuario]);
     
 
 
             return $builder->get()->getResultArray();
             if(password_verify($clave, $builder['clave'])){
                 return true;
             }}
 }