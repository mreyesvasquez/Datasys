<?php
session_start();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}else{
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
                <div id="titulos">
                    <fieldset>
                        ADMINISTRACI&Oacute;N DE PROVEEDORES
                    </fieldset>
                </div>
                <div id="Datos2">
                    <form action="Mantenedores/ProveedoresGuardar.php" method="get" mane="frmProveedor">
                        <br>
                        <fieldset>Datos del Proveedor
                        <table style="width: 100%" border="0">
                            <tr>
                                <td style="height: 40px;width: 20px"></td>
                                <td>Razon Social:</td>
                                <td><input type="text" name="txtrazon" size="30" placeholder="Razon Social"></td>
                                <td>RUC:</td>
                                <td><input type="text" name="txtruc" size="20" placeholder="RUC"></td>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td style="height: 40px"></td>
                                <td>Representante Legal:</td>
                                <td><input type="text" name="txtrepresentante" size="50" placeholder="Representante Legal"></td>
                                <td>DNI:</td>
                                <td><input type="text" name="txtdni" size="10" placeholder="DNI"></td>
                                <td>Telefono:</td>
                                <td><input type="text" name="txttelefono" size="10" placeholder="Telefono Fijo"></td>
                            </tr>
                            <tr>
                                <td style="height: 40px"></td>
                                <td>Direcci&oacute;n:</td>
                                <td><input type="text" name="txtdireccion" size="50" placeholder="Direccion"></td>
                                <td>Correo Electronico:</td>
                                <td><input type="email" name="txtemail" size="50" placeholder="Email"></td>
                                <td>Celular:</td>
                                <td><input type="text" name="txtcelular" size="10" placeholder="Celular"></td>
                            </tr>
                            <tr>

                            </tr>
                        </table>
                        </fieldset>
                        <br>
                        <table align="center">
                            <tr>
                                <td><input type="submit" value="Guardar" id="Save"></td>
                                <td><input type="reset" value="Limpiar" id="Limpiar"></td>
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