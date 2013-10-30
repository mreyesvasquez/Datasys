<?php
    function Conectarse(){
    $servidor="localhost";
    $basededatos="datasysbd";
    $usuario="root";
    $clave="";
    $cn= mysql_connect($servidor, $usuario, $clave) or die ("Error conectando a la base de datos");
    mysql_select_db($basededatos, $cn) or die ("Error seleccionando la base de datos");
    return $cn;
}
?>
