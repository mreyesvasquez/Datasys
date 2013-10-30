<?php
session_start();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}else{
    include("Conexion/Conexion.php");
    $cn = Conectarse();
    $idcargos=$_GET['id'];
    $sql="select * from cargos where idcargos='$idcargos'";
    $result= mysql_query($sql);
    $row=mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Sistema de Inventario</title>
        <link href="Stylos/formato.css" rel="stylesheet" type="text/css">
        <link href="Stylos/menu.css" rel="stylesheet" type="text/css">
        <link href="Stylos/iconos.css" rel="stylesheet" type="text/css">
		<script language="javascript" src="JavaScrip/fecha_hora.js" type="text/javascript" ></script>
		<script language="javascript" src="JavaScrip/validar.js" type="text/javascript" ></script>
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
                        MANTENEDOR DE CARGOS
                    </fieldset>    
                </div>
                <div id="Datos">
                    <form action="Mantenedores/CargosEditar.php" method="post" name="frmCargos">
                        <fieldset>
                        <table border="0">
                            <tr>
                                <td Style="height: 40px; width: 30px"></td>
                                <td>Cargo:</td>
                                <td><input type="hidden"  value="<?php echo $row["idcargos"]; ?>"  name="lblidcargos" /><input type="text" name="txtcargos" value="<?php echo $row["cargos"]; ?>" size="40" /></td>
                            </tr>
                        </table>
                        </fieldset>
                        <br>
                        <table align="center">
                            <tr>
                                <td><input type="submit" value="Actualizar" id="Modificar"/></td>
                                <td><a onclick="javascript:location.href='Cargos.php'"><input type="button" value="Salir" id="Salir"></a></td>
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