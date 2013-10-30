<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $idtrabajadores=$_POST["idtrabajadores"];
    $txtnombres=strtoupper($_POST['txtnombres']);
    $txtpaterno=strtoupper($_POST['txtpaterno']);
    $txtmaterno=strtoupper($_POST['txtmaterno']);
    $txtdni=strtoupper($_POST['txtdni']);
    $txtdireccion=strtoupper($_POST['txtdireccion']);
    $txttelefono=strtoupper($_POST['txttelefono']);
    $txtdate=strtoupper($_POST['txtdate']);
    $txtemail=strtoupper($_POST['txtemail']);
    $cbocargos=$_POST['cbocargos'];
    $txtusuario=strtoupper($_POST['txtusuario']);
    $txtpasword=$_POST['txtpasword'];
    $rspersonal="update trabajadores set nombres='$txtnombres',paterno='$txtpaterno',materno='$txtmaterno',dni='$txtdni',
        direccion='$txtdireccion',telefono='$txttelefono',fechanacimiento='$txtdate',email='$txtemail',
            usuario='$txtusuario',password='$txtpasword',estado='A',idcargos='$cbocargos' where idtrabajadores='$idtrabajadores'";
    $insertar= mysql_query($rspersonal);
    header("Location: ../Trabajadores.php")
?>