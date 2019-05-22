<?php
class ou{

    private $nombre;
    private $descripcion;
    private $ruta;

    function getNombre(){
        return $this->nombre;
    }
    function getDescripcion(){
        return $this->descripcion;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    function getRuta(){
        return $this->ruta;
    }
    function eliminar($conexion){
        $auto=ldap_delete($conexion,$this->getRuta());
    }
    function agregar($conexion){
        $info['objectClass'][0] = "top";
        $info['objectClass'][1] = "organizationalUnit";
        $info['ou'] = $this->getNombre();
        $info['description'] = $this->getDescripcion();
        $auto=ldap_add($conexion,$this->getRuta(),$info);
        echo"Usuario a agregado: ".$this->getNombre()." en la ruta ". $this->getRuta();
    }

    function modificar($conexion){
        $info['ou'] = $this->getNombre();
        $info['description'] = $this->getDescripcion();
        $auto=ldap_rename($conexion,$_SESSION['ruta'],"ou=".$this->getNombre(),"dc=ldap,dc=es",true);
        $auto=ldap_modify($conexion,$this->getRuta(),$info);
        echo"Unidad organizativa: ".$this->getNombre()." en la ruta ". $this->getRuta(). " va a modificar la ruta: ".$_SESSION['ruta'];
    }
    function buscar($conexion){
        $sr=ldap_search($conexion,"dc=ldap, dc=es","ou=".$_POST['busqueda']);
        $info = ldap_get_entries($conexion,$sr);
        for ($i=0; $i<$info["count"]; $i++) {
            echo "
            <tr class='gradeX'>
                <td><p class='p$i'>".$info[$i]["ou"][0]."</p></td>
            </tr> ";
        }
    }
    function buscar_disponibles($conexion){
        $sr=ldap_search($conexion,"dc=ldap, dc=es","ou=".$_POST['busqueda']);
        $info = ldap_get_entries($conexion,$sr);
            echo "<option value=''>NADA</option>";
        for ($i=0; $i<$info["count"]; $i++) {
            echo "
            <option value='".$info[$i]["ou"][0]."'>".$info[$i]["ou"][0]."</option>";
        }
    }
    function buscar_o($conexion){
        $justthese = array("ou","description");
        $sr=ldap_search($conexion,"dc=ldap, dc=es","ou=".$_POST['nombre']);
        $info = ldap_get_entries($conexion,$sr);
        $arrayrespuesta = array(
            $info[0]["ou"][0],
            $info[0]["description"][0]);
        echo json_encode($arrayrespuesta);
    }
    public function __construct($nombre){
            $this->nombre = $nombre;
        if(empty($_POST['descripcion'])){
            $this->descripcion = "Unidad organizativa de " . $this->getNombre();
        }
        else{
            $this->descripcion = $_POST['descripcion'];
        }
        $this->ruta = "ou=".$this->getNombre().",dc=ldap,dc=es";
    }
}

?>