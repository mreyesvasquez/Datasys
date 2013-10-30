<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $tipoper=$_GET['tipoper'];
    $sexo=$_GET['sexo'];
    $txtrazon=strtoupper($_GET['txtrazon']);
    $txtnom=strtoupper($_GET['txtnom']);
    $txtpater=strtoupper($_GET['txtpater']);
    $txtmater=strtoupper($_GET['txtmater']);
    $txtfechanac=strtoupper($_GET['txtfechanac']);
    $tipdoc=$_GET['tipdoc'];
    $txtdoc=strtoupper($_GET['txtdoc']);
    $txtdireccion=strtoupper($_GET['txtdireccion']);
    $txtcelular=strtoupper($_GET['txtcelular']);
    $txttelefono=strtoupper($_GET['txttelefono']);
    $txtemail=strtoupper($_GET['txtemail']);
    $rsclientes="insert into clientes(tipoper,sexo,razon,nombres,paterno,materno,fechanacimiento,documento,numdoc,direccion,celular,telefono,email)value('$tipoper','$sexo','$txtrazon','$txtnom','$txtpater','$txtmater','$txtfechanac','$tipdoc','$txtdoc','$txtdireccion','$txtcelular','$txttelefono','$txtemail')";
    $insertar= mysql_query($rsclientes);
    header("Location: ../Clientes.php")
?>