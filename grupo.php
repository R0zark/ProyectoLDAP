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
    function setRuta($ruta){
        $this->ruta = $ruta;
    }
    function setIdGrupo($idgrupo){
        $this->idgrupo = $idgrupo;
    }
    function setOU($ou){
        $this->ou = $ou;
    }
    function eliminar($conexion){
        ldap_delete($conexion,$ruta);
    }
    function agregar($conexion){
        $info['objectClass'] = "posixGroup";
        $info['cn'] = $_POST['nombre'];
        $info['gidNumber'] = $_POST['id'];

        if(!empty($_POST['ou'])){
            $this->setRuta("cn=".$_POST['nombre'].",ou=".$_POST['ou'].",dc=ldap,dc=es");
        }
        else{
            $this->setRuta("cn=".$_POST['nombre'].",dc=ldap,dc=es");
        }
        echo $this->getRuta();
        ldap_add($conexion,$this->getRuta(),$info);
    }
    
    function buscar($conexion){
        $filtro = "(&(cn=".$_POST['busqueda'].")(objectClass=posixGroup))";
        $sr = ldap_search($conexion,"dc=ldap, dc=es",$filtro);
        $info = ldap_get_entries($conexion,$sr);
        for ($i=0; $i<$info["count"]; $i++) {
            echo "
            <tr class='gradeX'>
                <td><p class='p$i'>".$info[$i]["cn"][0]."</p></td>
            </tr> ";
        }
    }
    /*
    function buscar_o($conexion){
        $justthese = array("cn","description");
        $sr=ldap_search($conexion,"dc=ldap, dc=es","cn=".$_POST['nombre']);
        $info = ldap_get_entries($conexion,$sr);
        $arrayrespuesta = array(
            $info[0]["cn"][0],
            $info[0]["description"][0]);
        
        print_r(ldap_explode_dn($this->getRuta(),0));
        /*die;
    
        echo json_encode($arrayrespuesta);
}*/
    public function __construct(){
        if(!empty($_POST['ou'])){
            $this->ou= $_POST['ou'];
        }
    }
}
?>