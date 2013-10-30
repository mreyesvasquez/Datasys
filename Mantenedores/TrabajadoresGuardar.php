<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $txtnombres=strtoupper($_GET['txtnombres']);
    $txtpaterno=strtoupper($_GET['txtpaterno']);
    $txtmaterno=strtoupper($_GET['txtmaterno']);
    $txtdni=strtoupper($_GET['txtdni']);
    $txtdireccion=strtoupper($_GET['txtdireccion']);
    $txttelefono=strtoupper($_GET['txttelefono']);
    $txtdatetime=strtoupper($_GET['txtdatetime']);
    $txtemail=strtoupper($_GET['txtemail']);
    $cbocargos=$_GET['cbocargos'];
    $txtusuario=strtoupper($_GET['txtusuario']);
    $txtpasword=$_GET['txtpasword'];
    $rspersonal="insert into trabajadores(nombres,paterno,materno,dni,direccion,telefono,fechanacimiento,email,usuario,password,estado,idcargos) value('$txtnombres','$txtpaterno','$txtmaterno','$txtdni','$txtdireccion','$txttelefono','$txtdatetime','$txtemail','$txtusuario','$txtpasword','A','$cbocargos')";
    $insertar= mysql_query($rspersonal);
    header("Location: ../Trabajadores.php")
?>
