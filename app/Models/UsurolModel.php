<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsurolModel
 extends Model{
    protected $table      = 'usurol';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_usuario','id_rol','usuario','estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'fec_insercion';
    protected $updatedField  = 'fec_modificacion';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
    ];
    protected $validationMessages = [];
    protected $skipValidation     = true;


  
    public function listar()
    {
        $builder = $this->builder($this->table);

        $builder = $builder->where('usurol.estado', 1);
        
        $builder = $builder->join('rol', 'usurol.id_rol = rol.id');
        $builder = $builder->join('usuario', 'usurol.id_usuario = usuario.id');
        $builder = $builder->select('usuario.nom_usuario , rol.rol, usurol.id_usuario,usurol.id_rol, usurol.*');

        $builder = $builder->get();
        return $builder->getResultArray();
    }
    
    public function login($nom_usuario)
    {
        $builder = $this->builder($this->table);

        $builder = $builder->where('usurol.estado', 1);
        $builder = $builder->where(['usuario.nom_usuario'=> $nom_usuario]);

        
        $builder = $builder->join('rol', 'usurol.id_rol = rol.id');
        $builder = $builder->join('usuario', 'usurol.id_usuario = usuario.id');
        $builder = $builder->select('usuario.nom_usuario , rol.rol, usurol.id_usuario,usurol.id_rol, usurol.*');

        $builder = $builder->get();
        return $builder->getResult();
    
    }public function loginn($data){
			$Usuario = $this->db->table('usurol');
			$Usuario->where($data);
			return $Usuario->get()->getResultArray();
        
    
}
public function log($nom_usuario,$clave)
{

    $db=\Config\Database::connect();


$sql = "SELECT us.id_usuario as id_usuario, us.nom_usuario as nom_usuario, us.clave as clave, r.id_rol as id_rol, r.rol as rol FROM usuario_roles usr INNER JOIN roles r ON usr.id_rol = r.id_rol INNER JOIN usuarios us on us.id_usuario=usr.id_usuario WHERE nom_usuario='$nom_usuario' AND clave='$clave' ";	
$result = $db->query($sql);   
 return $result->getResult();
}
}