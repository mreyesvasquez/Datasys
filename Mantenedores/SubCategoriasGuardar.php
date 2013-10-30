<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $categorias=$_POST['selecsubcateg'];
    $subcategorias=strtoupper($_POST['txtsubcategoria']);
    $rssubcategorias="insert into subcategorias(subcategorias, idcategorias) value('$subcategorias','$categorias')";
    $insertar= mysql_query($rssubcategorias);
    header("Location: ../SubCategorias.php")
?>
