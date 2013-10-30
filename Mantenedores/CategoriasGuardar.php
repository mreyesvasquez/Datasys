<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $categorias=strtoupper($_GET['txtcategorias']);
    $marcas=$_GET['selecmarca'];
    $rscategorias="insert into categorias(categorias,idmarcas) value('$categorias','$marcas')";
    $insertar= mysql_query($rscategorias);
    header("Location: ../Categorias.php")
?>
