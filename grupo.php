<?php
class grupo{
    private $nombre;
    private $idgrupo;
    private $descripcion;
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
    function getDescripcion(){
        return $this->descripcion;
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
        ldap_delete($conexion,$this->getRuta());
    }
    function agregar($conexion){
        $info['objectClass'] = "posixGroup";
        $info['cn'] = $this->getNombre();
        $info['description'] = $this->getDescripcion();
        $info['gidNumber'] = $this->getIdGrupo();
        
        if(!empty($_POST['ou'])){
            $this->setRuta("cn=".$this->getNombre().",ou=".$_POST['ou'].",dc=ldap,dc=es");
        }
        else{
            $this->setRuta("cn=".$this->getNombre().",dc=ldap,dc=es");
        }
        $auto=ldap_add($conexion,$this->getRuta(),$info);

    }

    function modificar($conexion){
        $info['cn'] = $this->getNombre();
        $info['description'] = $this->getDescripcion();
        $info['gidNumber']= $this->getIdGrupo();
        if(empty($this->getOU())){
            $auto=ldap_rename($conexion,$_SESSION['ruta'],"cn=".$this->getNombre(),"dc=ldap,dc=es",true);
        }
        else{
            $this->getOU();
            $auto=ldap_rename($conexion,$_SESSION['ruta'],"cn=".$this->getNombre(),"ou=".$this->getOU().",dc=ldap,dc=es",true);
        }
        $auto=ldap_modify($conexion,$this->getRuta(),$info);
        echo"Unidad organizativa: ".$this->getNombre()." en la ruta ". $this->getRuta(). " va a modificar la ruta: ".$_SESSION['ruta'];
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
    
    function buscar_disponibles($conexion){
        $filtro = "(&(cn=".$_POST['busqueda'].")(objectClass=posixGroup))";
        $sr=ldap_search($conexion,"dc=ldap, dc=es",$filtro);
        $info = ldap_get_entries($conexion,$sr);
            echo "<option value=''>NADA</option>";
        for ($i=0; $i<$info["count"]; $i++) {
            echo "
            <option value='".$info[$i]["gidnumber"][0]."'>".$info[$i]["cn"][0]."</option>";
        }
    }


    function buscar_o($conexion){
        $justthese = array("cn","description");
        $filtro="(&(cn=".$_POST['nombre'].")(objectClass=posixGroup))";
        $sr=ldap_search($conexion,"dc=ldap, dc=es",$filtro);
        $info = ldap_get_entries($conexion,$sr);

        if(!empty($info[0]["description"][0])){
            $arrayrespuesta = array(
                $info[0]["cn"][0],
                $info[0]["gidnumber"][0],
                $info[0]["description"][0],
                $info[0]["dn"]);
        }
        else{
            $arrayrespuesta = array(
                $info[0]["cn"][0],
                $info[0]["gidnumber"][0],
                $info[0]["description"][0] = "",
                $info[0]["dn"]
            ); 
        }
        echo json_encode($arrayrespuesta);
    }
    public function __construct($nombre){
        $this->nombre = $nombre;
        if(!empty($_POST['ou'])){
            $this->ou= $_POST['ou'];
            $this->ruta =  "cn=".$nombre.",ou=".$_POST['ou'].",dc=ldap,dc=es";
        }
        else{
            $this->ruta =  "cn=".$nombre.",dc=ldap,dc=es";
        }
        if(empty($_POST['descripcion'])){
            $this->descripcion = "Grupo de " . $this->getNombre();
        }
        else{
            $this->descripcion = $_POST['descripcion'];
        }
        if(empty($_POST['id'])){
            $this->idgrupo = "";
        }
        else{
            $this->idgrupo = $_POST['id'];
        }
    }
}
?>