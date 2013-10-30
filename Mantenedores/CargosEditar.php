<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $idcargos=$_POST['lblidcargos'];
    $txtcargos=strtoupper($_POST['txtcargos']);
    $rscargos="update cargos set cargos='$txtcargos' where idcargos='$idcargos' ";
    $insertar= mysql_query($rscargos);
    header("Location: ../Cargos.php")
?>
