<?php
session_start();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}else{
    include("Conexion/Conexion.php");
	$cn = Conectarse();
	$idproveedores=$_GET['id'];
    $sql="select * from proveedores where idproveedores='$idproveedores'";
    $result= mysql_query($sql);
	$row=mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Sistema de Inventario</title>
        <link href="Stylos/formato.css" rel="stylesheet" type="text/css">
        <link href="Stylos/iconos.css" rel="stylesheet" type="text/css">
        <link href="Stylos/menu.css" rel="stylesheet" type="text/css">
        <script language="javascript" src="Js/validar.js" type="text/javascript" ></script>
        <script language="javascript" src="JavaScrip/fecha_hora.js" type="text/javascript" ></script>
		
    </head>
    <body>
        <div id="todo">
            <div id="banner">
            </div>
            <div id="menu">
            </div>
            <div id="cuerpo">     
                <br/>
                <div id="titulos">
                    <fieldset>
                        ADMINISTRACI&Oacute;N DE PROVEEDORES
                    </fieldset>
                </div>
                <div id="Datos2">
                    <form action="Mantenedores/ProveedoresEditar.php" method="post" mane="frmProveedor">
                        <fieldset>
                        Modificar Datos del Proveedor
                        <table style="width: 100%" border="0">
                            <tr>
                                <td style="height: 40px;width: 20px"></td>
                                <td>Razon Social:</td>
                                <td><input type="hidden" name="idproveedores" value="<?php echo $row["idproveedores"];?>" /><input type="text" name="txtrazon" value="<?php echo $row["razon"];?>" size="30" placeholder="Razon Social"></td>
                                <td>RUC:</td>
                                <td><input type="text" name="txtruc" value="<?php echo $row["ruc"];?>" size="20" placeholder="RUC"></td>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td style="height: 40px"></td>
                                <td>Representante Legal:</td>
                                <td><input type="text" name="txtrepresentante" value="<?php echo $row["representante"];?>"  size="50" placeholder="Representante Legal"></td>
                                <td>DNI:</td>
                                <td><input type="text" name="txtdni" size="10" value="<?php echo $row["dni"];?>" placeholder="DNI"></td>
                                <td>Telefono:</td>
                                <td><input type="text" name="txttelefono" size="10" value="<?php echo $row["telefono"];?>" placeholder="Telefono Fijo"></td>
                            </tr>
                            <tr>
                                <td style="height: 40px"></td>
                                <td>Direcci&oacute;n:</td>
                                <td><input type="text" name="txtdireccion" size="50" value="<?php echo $row["direccion"];?>" placeholder="Direccion"></td>
                                <td>Correo Electronico:</td>
                                <td><input type="email" name="txtemail" size="50" value="<?php echo $row["celular"];?>" placeholder="Email"></td>
                                <td>Celular:</td>
                                <td><input type="text" name="txtcelular" size="10" value="<?php echo $row["email"];?>" placeholder="Celular"></td>
                            </tr>
                            <tr>

                            </tr>
                        </table>
                        </fieldset>
                        <br>
                        <table align="center">
                            <tr>
                                <td><input type="submit" value="Actualizar" id="Modificar"></td>
                                <td><a onclick="javascript:location.href='Proveedores.php'"><input type="button" value="Salir" id="Salir"></a></td>
                            </tr>
                        </table> 
                    </form>
                </div>
            </div>
            <div id="pag">  
            </div>
        </div>
    </body>
</html>
<?php } ?>