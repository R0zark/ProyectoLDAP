<?php
class Usuario{

    private $id;
    private $usuario;
    private $nombre;
    private $apellidos;
    private $idgrupo;
    private $ruta;

    function getId(){
        return $this->id;
    }
    function getUsuario(){
        return $this->usuario;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getApellidos(){
        return $this->apellidos;
    }
    function getIdGrupo(){
        return $this->idgrupo;
    }
    function getRuta(){
        return $this->ruta;
    }
    function setId($id){
        $this->id = $id;
    }
    function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }
    function setIdGrupo($idgrupo){
        $this->idgrupo = $idgrupo;
    }
    function eliminar($conexion){
        try{
            //ldap_delete($conexion,$this->ruta);
            echo"Usuario eliminado: ".$this->getUsuario();
        }
        catch(Exception $e){
            echo"Ha ocurrido un error $e->getMessage()";
        }
    }
    function agregar($conexion){
        try{
            $info['objectClass'][0] = "inetOrgPerson";
            $info['objectClass'][1] = "posixAccount";
            $info['cn'] = $this->getNombre();
            $info['sn'] = $this->getApellidos();
            $info['uid'] = $this->getUsuario();
            $info['uidNumber'] = $this->getId();
            $info['gidNumber'] = $this->getIdGrupo();
            $info['loginShell'] = "/bin/bash";
            $info['homeDirectory'] = "/home/".$this->getUsuario();
            $auto=ldap_add($conexion,$this->getRuta(),$info);
            echo"Usuario a agregado: ".$this->getUsuario()." en la ruta ". $this->getRuta();
        }
        catch(Exception $e){
            echo"Ha ocurrido un error $e->getMessage()";
        }
    }
    function buscar($conexion){
        $justthese = array("ou","description");
        $sr=ldap_search($conexion,"dc=ldap, dc=es","ou=".$_POST['nombre']);
        $info = ldap_get_entries($conexion,$sr);
        $arrayrespuesta = array($info[0]["ou"][0],$info[0]["description"][0]);
        echo json_encode($arrayrespuesta);
    }

    public function __construct($id,$usuario,$nombre,$apellidos,$idgrupo){
        $this->id = $id;
        $this->usuario = strtolower($usuario);
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->idgrupo = $idgrupo;
        $this->ruta = "uid=".$this->usuario.",dc=ldap,dc=es";
    }
}
?>