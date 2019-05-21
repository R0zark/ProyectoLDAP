<?php 
session_start();
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
        if(!empty($_POST['nombre'])){
            $ou= new ou($_POST['nombre']);
        }
        else{
            $ou= new ou(null); 
        }
        break;
    case "usuario":
        if(!empty($_POST['usuario'])){
            $usuario= new usuario(
                $_POST['id'],
                $_POST['usuario'],
                $_POST['contrasenya'],
                $_POST['nombre'],
                $_POST['apellidos'],
                $_POST['idgrupo']); 
        }
        else{
            $usuario = new usuario(null,null,null,null,null,null);
        }
        break;
    case "grupo":
       
    
        $grupo= new grupo(); 
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
        if(isset($usuario))
            $usuario->buscar($conexion);
        if(isset($ou))
            $ou->buscar($conexion);
        if(isset($grupo))
            $grupo->buscar($conexion);
        break;
    case "buscar-o":
        if(isset($usuario))
            $usuario->buscar_o($conexion);
        if(isset($ou))
            $ou->buscar_o($conexion);
        if(isset($grupo))
            $grupo->buscar_o($conexion);
        break;
    case "sesion":
        if(isset($usuario))
            
        if(isset($ou))
            $_SESSION['nombre'] = $ou->getNombre();
            $_SESSION['descripcion'] = $ou->getDescripcion();
            $_SESSION['ruta'] = $ou->getRuta();
        if(isset($grupo))
            
        break;

}
?>