<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $marcas=strtoupper($_GET['txtmarcas']);
    $rsmarcas="insert into marcas(marcas) value('$marcas')";
    $insertar= mysql_query($rsmarcas);
    header("Location: ../Marcas.php")
?>