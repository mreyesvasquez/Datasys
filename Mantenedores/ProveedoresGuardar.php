<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $razon=strtoupper($_GET['txtrazon']);
    $ruc=strtoupper($_GET['txtruc']);
    $representante=strtoupper($_GET['txtrepresentante']);
    $telefono=strtoupper($_GET['txttelefono']);
    $dni=strtoupper($_GET['txtdni']);
    $celular=strtoupper($_GET['txtcelular']);
    $email=strtoupper($_GET['txtemail']);
    $direccion=strtoupper($_GET['txtdireccion']);
    $rsproveedores="insert into proveedores(razon,ruc,representante,dni,telefono,celular,email,direccion) value('$razon','$ruc','$representante','$dni','$telefono','$celular','$email','$direccion')";
    $insertar= mysql_query($rsproveedores);
    header("Location: ../Proveedores.php")
?>
