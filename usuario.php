<?php
class Usuario{

    private $id;
    private $usuario;
    private $nombre;
    private $contrasenya;
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
    function getContrasenya(){
        return $this->contrasenya;
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
    function setContrasenya($contrasenya){
        $this->contrasenya = $contrasenya;
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
            echo $this->getRuta();
            $auto=ldap_delete($conexion,$this->ruta);
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
            $info['gidNumber'] = $_POST['idgrupo'];
            $info['loginShell'] = "/bin/bash";
            $info['homeDirectory'] = "/home/".$this->getUsuario();
            $info['userPassword'] = '{MD5}' . md5($this->getContrasenya(),true);
            $auto=ldap_add($conexion,$this->getRuta(),$info);
            echo"Usuario a agregado: ".$this->getUsuario()." en la ruta ". $this->getRuta();
        }
        catch(Exception $e){
            echo"Ha ocurrido un error $e->getMessage()";
        }
    }
    function buscar($conexion){
        $sr=ldap_search($conexion,"dc=ldap, dc=es","(&(objectClass=posixAccount)(cn=".$_POST['busqueda']."))");
        $info = ldap_get_entries($conexion,$sr);
        for ($i=0; $i<$info["count"]; $i++) {
            echo "
            <tr class='gradeX'>
                <td><p class='p$i'>".$info[$i]["uid"][0]."</p></td>
                <td><p class='p$i'>".$info[$i]["cn"][0]."</p></td>
            </tr> ";
        }
    }
    function buscar_o($conexion){
        $justthese = array("cn","sn","uid","uidNumber","gidNumber");
        $sr=ldap_search($conexion,"dc=ldap, dc=es","uid=".$_POST['usuario'],$justthese);
        $info = ldap_get_entries($conexion,$sr);
        $arrayrespuesta = array(
            $info[0]["cn"][0],
            $info[0]["sn"][0],
            $info[0]["uid"][0],
            $info[0]["uidnumber"][0],
            $info[0]["gidnumber"][0],
        );
        echo json_encode($arrayrespuesta);
    }
    public function __construct($id,$usuario,$contrasenya,$nombre,$apellidos,$idgrupo){
        $this->id = $id;
        $this->usuario = strtolower($usuario);
        $this->contrasenya = $contrasenya;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->idgrupo = $idgrupo;
        $this->ruta = "cn=".$this->usuario.",dc=ldap,dc=es";
    }
}
?>