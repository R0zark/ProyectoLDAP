<?php
class grupo{
    private $nombre;
    private $idgrupo;
    private $ou;
    private $ruta;

    function getNombre(){
        return $this->nombre;
    }
    function getIdGrupo(){
        return $this->idgrupo;
    }
    function getOU(){
        return $this->ou;
    }
    function getRuta(){
        return $this->ruta;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setIdGrupo($idgrupo){
        $this->idgrupo = $idgrupo;
    }
    function setOU($ou){
        $this->ou = $ou;
    }
    function eliminar($conexion){
        echo $this->ruta;
        // DESCOMENTA ESTO ldap_delete($conexion,$ruta);
    }
    function agregar($conexion){
        $this->$info['objectClass'] = "posixGroup";
        $this->$info['cn'] = $this->getNombre();
        $this->$info['gidNumber'] = $this->getIdGrupo();

        if(isset($_POST['ou']) != null)

        echo $this->getRuta();
        //ldap_add($conexion,$this->getRuta(),$info);
    }
    public function __construct($id,$nombre,$ou){
        $this->id = $id;
        $this->nombre = $nombre;
        if($ou != null){
            $this->ou = $ou;
            $this->ruta = "cn=".$this->$nombre.",ou=".$this->ou.",dc=ldap,dc=es";
        }
        else{
            $this->ruta = "cn=".$this->nombre.",dc=ldap,dc=es";
        }
    }
}
?>