<?php
session_start();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}else{
    include("Conexion/Conexion.php");
	$cn = Conectarse();
	$idsubcategoria=$_GET['id'];
        $sql="select * from subcategorias where idsubcategorias='$idsubcategoria'";
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
        <script language="javascript" src="JavaScrip/validar.js" type="text/javascript" ></script>
		<script language="javascript" src="JavaScrip/fecha_hora.js" type="text/javascript" ></script>
		
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
                        MANTENEDOR DE SUBCATEGORIAS
                    </fieldset> 
                </div>
                <div id="Datos">
                    <form action="Mantenedores/SubCategoriasEditar.php" method="post" name="frmSubCategorias" onSubmit="validarSubCategorias(); return false">   
                        <fieldset>
                        <table border="0">
                            <tr>
                                <td Style="height: 40px; width: 30px"></td>
                                <td>Categoria:</td>
                                <td><select name="selecsubcateg">
                                        <option value="">Seleccionar</option>
                                        <?php 
                                        $sql="select * from categorias";
                                        $result=mysql_query($sql,$cn);
                                        while ($row1=mysql_fetch_array($result))
                                           { if ($row["idcategorias"]==$row1["idcategorias"])
                                            {echo "<option value=".$row1[idcategorias]." selected> ".$row1[categorias]." </option>";}
                                            else
                                            {echo "<option value=".$row1[idcategorias]." > ".$row1[categorias]." </option>";}
                                           }
                                        ?>
					</select>
                                </td>
                                <td style="width: 100px"></td>
                                <td>SubCategoria:</td>
                                <td><input type="hidden" name="lblidsubcategorias" value="<?php echo $row["idsubcategorias"];?>" />
                                    <input type="text" name="txtsubcategorias" value="<?php echo $row["subcategorias"];?>" size="50" placeholder="Ingresar Nueva Sub-Categoria"/></td>
                                
                            </tr>
                        </table>
                        </fieldset>
                        <br>
                        <table align="center">
                            <tr>
                                <td><input type="submit" value="Actualizar" id="Modificar"/></td>
                                <td><a onclick="javascript:location.href='SubCategorias.php'"><input type="button" value="Salir" id="Salir"></a>&nbsp;</td>
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