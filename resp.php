<?php 
require('ou.php');
require('usuario.php');
require('grupo.php');

try{
    $conexion = ldap_connect('ldap.es', '389') or die("Vamos, que no funciona");
    ldap_set_option($conexion, LDAP_OPT_PROTOCOL_VERSION, 3);
    $auto = ldap_bind($conexion, "cn=admin,dc=ldap,dc=es", "root");
}
catch(Exception $e ){
    echo"Ha ocurrido un error: ", $e->getMessage(),"\n";
}
switch($_POST['objetivo']){
    case "ou":
        $ou= new ou($_POST['nombre']); 
        break;
    case "usuario":
        $usuario= new usuario(
            $_POST['id'],
            $_POST['usuario'],$_POST['nombre'],
            $_POST['apellidos'],
            $_POST['idgrupo']); 
        break;
    case "grupo":
        $grupo= new grupo($nombre,$id); 
        break;
}
switch($_POST['accion']) {
    case "eliminar":
        if(isset($usuario))
            $usuario->eliminar($conexion);
        if(isset($ou))
            $ou->eliminar($conexion);
        if(isset($grupo))
            $grupo->eliminar($conexion);
        break;
    case "agregar":
        if(isset($usuario))
            $usuario->agregar($conexion);
        if(isset($ou))
            $ou->agregar($conexion);
        if(isset($grupo))
            $grupo->agregar($conexion);
        break;
    case "modificar":
        if(isset($usuario))
            $usuario->modificar($conexion);
        if(isset($ou))
            $ou->modificar($conexion);
        if(isset($grupo))
            $grupo->modificar($conexion);
        break;
    case "buscar":
        $sr=ldap_search($conexion,"dc=ldap, dc=es","ou=".$_POST['busqueda']);
        $info = ldap_get_entries($conexion,$sr);
        for ($i=0; $i<$info["count"]; $i++) {
            echo "
            <tr class='gradeX'>
                <td><p class='p$i'>".$info[$i]["ou"][0]."</p></td>
            </tr> ";
        }
        break;
    case "buscar-o":
        if(isset($usuario))
            $usuario->buscar($conexion);
        if(isset($ou))
            $ou->buscar($conexion);
        if(isset($grupo))
            $grupo->buscar($conexion);
        break;
}
?>