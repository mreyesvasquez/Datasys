<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $txtcargos=strtoupper($_GET['txtcargos']);
    $rscargos="insert into cargos(cargos) value('$txtcargos')";
    $insertar= mysql_query($rscargos);
    header("Location: ../Cargos.php")
?>
