<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $idcategorias=$_POST["lblidcategorias"];
    $categorias=strtoupper($_POST['txtcategorias']);
    $marcas=strtoupper($_POST['selecmarca']);
    $rscategorias="update categorias set categorias='$categorias',idmarcas='$marcas' where idcategorias='$idcategorias'";
    mysql_query($rscategorias);
    header("Location: ../Categorias.php")
?>