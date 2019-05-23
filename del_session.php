<?php
session_start();
echo "Has salido con exito. Hasta luego se te redirigirá al login";
unset($_SESSION['admin']);
session_destroy();
header("refresh:2;url=login.html");
?>