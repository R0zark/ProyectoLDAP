<?php
session_start();

if(!empty($_POST['input-usuario'])){

    if($_POST['input-usuario'] == "admin" & $_POST['input-contrasenya'] == "root" ){
        $conexion = ldap_connect('ldap.es', '389') or die("Vamos, que no funciona");
        ldap_set_option($conexion, LDAP_OPT_PROTOCOL_VERSION, 3);
        $auto = ldap_bind($conexion, "cn=".$_POST['input-usuario'].",dc=ldap,dc=es", $_POST['input-contrasenya']);

        $_SESSION['admin'] = true;

        echo "Se ha loggeado con exito. Se te redirecionará en 5 segundos";
        header("refresh:5;url=index.html");
    }
    else{
        echo "El usuario proporcionado no existe.Se redirigirá el login en 5 segundos";
        header("refresh:5;url=login.html");

    }
}
else{
    echo "Hubo un error redirigiendo al formulario en 5 segundos.";
    header("refresh:5;url=index.html");
}




?>