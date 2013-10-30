<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $idclientes=$_POST["idclientes"];
    $tipoper=$_POST['tipoper'];
    $sexo=$_POST['sexo'];
    $txtrazon=strtoupper($_POST['txtrazon']);
    $txtnom=strtoupper($_POST['txtnom']);
    $txtpater=strtoupper($_POST['txtpater']);
    $txtmater=strtoupper($_POST['txtmater']);
    $txtfechanac=strtoupper($_POST['txtfechanac']);
    $tipdoc=$_POST['tipdoc'];
    $txtdoc=strtoupper($_POST['txtdoc']);
    $txtdireccion=strtoupper($_POST['txtdireccion']);
    $txtcelular=strtoupper($_POST['txtcelular']);
    $txttelefono=strtoupper($_POST['txttelefono']);
    $txtemail=strtoupper($_POST['txtemail']);
    $rsclientes="update clientes set tipoper='$tipoper',sexo='$sexo',razon='$txtrazon',nombres='$txtnom',
    paterno='$txtpater',materno='$txtmater',fechanacimiento='$txtfechanac',documento='$tipdoc',
    numdoc='$txtdoc',direccion='$txtdireccion',celular='$txtcelular',
    telefono='$txttelefono',email='$txtemail' where idclientes='$idclientes'";

    $insertar= mysql_query($rsclientes);
    header("Location: ../Clientes.php")
?>