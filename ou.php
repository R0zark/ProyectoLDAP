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
        echo $this->getDescripcion();
        $auto=ldap_add($conexion,$this->getRuta(),$info);
        echo"Usuario a agregado: ".$this->getNombre()." en la ruta ". $this->getRuta();
    }
    function buscar($conexion){
        $justthese = array("ou","description");
        $sr=ldap_search($conexion,"dc=ldap, dc=es","ou=".$_POST['nombre']);
        $info = ldap_get_entries($conexion,$sr);
        $arrayrespuesta = array($info[0]["ou"][0],$info[0]["description"][0]);
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