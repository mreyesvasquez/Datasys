<?php
session_start();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}else{
    include("Conexion/Conexion.php");
	$cn = Conectarse();
	$idmarca=$_GET['id'];
    $sql="select * from marcas where idmarcas='$idmarca'";
    $result= mysql_query($sql);
	$row=mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><html>
    <head>
        <title>Sistema de Inventario</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="Stylos/formato.css" rel="stylesheet" type="text/css">
        <link href="Stylos/iconos.css" rel="stylesheet" type="text/css">
        <link href="Stylos/menu.css" rel="stylesheet" type="text/css">
        <script language="javascript" src="JavaScrip/validar.js" type="text/javascript" ></script> 
        <script language="javascript" src="JavaScrip/validarcajas.js" type="text/javascript" ></script> 
    </head>
    <body>
        <div id="todo">
            <div id="banner">
                
            </div>
            <div id="menu">
            </div>
            <div id="cuerpo">
                <br>
                <div id="titulos">
                    <fieldset>
                        ADMINISTRACI&Oacute;N DE MARCAS 
                    </fieldset>
                </div>    
                <div id="Datos2">
                    <form action="Mantenedores/MarcasEditar.php" method="post" name="frmMarcas" onSubmit="validarMarcas(); return false">
                        <fieldset>
                        <table border="0">
                            
                            <tr>
                                <td style="height: 40px"></td>
                                <td>&nbsp;</td>
                                <td>Marca</td>
                                <td>
                                    <input type="hidden"  value="<?php echo $row["idmarcas"]; ?>"  name="lblidmarcas" />
                                    <input type="text" name="txtmarcas" id="txtmarcas" size="40" value="<?php echo $row["marcas"]; ?>" />
                                </td>
                            </tr>
                        </table>
                        </fieldset>
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <td><input type="submit" value="Actualizar" id="Modificar"/></td>
                                <td><input name="Botón" type="button" id="Salir" onclick="javascript:location.href='Marcas.php'" value="Salir">
                                </a></td>
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