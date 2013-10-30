<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $idproveedores=$_POST["idproveedores"];
    $razon=strtoupper($_POST['txtrazon']);
    $ruc=strtoupper($_POST['txtruc']);
    $representante=strtoupper($_POST['txtrepresentante']);
    $telefono=strtoupper($_POST['txttelefono']);
    $dni=strtoupper($_POST['txtdni']);
    $celular=strtoupper($_POST['txtcelular']);
    $email=strtoupper($_POST['txtemail']);
    $direccion=strtoupper($_POST['txtdireccion']);
    $rsproveedores="update proveedores set razon='$razon',ruc='$ruc',representante='$representante',dni='$dni',
	telefono='$telefono',celular='$celular',email='$email',direccion='$direccion' where idproveedores='$idproveedores'";
    mysql_query($rsproveedores);
    header("Location: ../Proveedores.php")
?>
