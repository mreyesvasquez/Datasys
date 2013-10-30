<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $idmarcas=$_POST["lblidmarcas"];
    $marcas=strtoupper($_POST['txtmarcas']);
    $rsmarcas="update marcas set marcas='$marcas' where idmarcas='$idmarcas'";
    $insertar= mysql_query($rsmarcas);
    header("Location: ../Marcas.php")
?>