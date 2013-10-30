<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $idsubcategorias=$_POST["lblidsubcategorias"];
    $categoria=$_POST["selecsubcateg"];
    $subcategorias=strtoupper($_POST['txtsubcategorias']);
    $rssubcategorias="update subcategorias set subcategorias='$subcategorias',idcategorias='$categoria' where idsubcategorias='$idsubcategorias'";
    mysql_query($rssubcategorias);
    header("Location: ../SubCategorias.php")
?>