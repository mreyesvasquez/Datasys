<?php
session_start();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}else{
include("Conexion/Conexion.php");
	$cn = Conectarse();
	$idproductos=$_GET['id'];
        $sql="select * from productos where idproductos='$idproductos'";
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
        <script language="javascript" src="JavaScrip/validar.js" type="text/javascript" ></script>
		<script language="javascript" src="JavaScrip/fecha_hora.js" type="text/javascript" ></script>
		<script language="javascript" src="JavaScrip/jquery-1.8.2.js" type="text/javascript" ></script>
	
		<script>
		function filtrar_subcategorias()
		{ var idcategoria=document.getElementById("seleccategoria").value;
		 $("#cargando").show();
		 document.getElementById("cargando").innerHTML='<div align=center><img src=Imagenes/images/anim.gif /></div>';
          
           $.post("cboSubCategorias.php",{
		      
              idcategoria:idcategoria
   			 },
    		function(data){
			 
       	      $("#subcategoria").html(data);
			  $("#cargando").hide();
    		});
			}
		</script>
		
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
                        ADMINISTRACI&Oacute;N DE PRODUCTOS
                    </fieldset>
                </div>
                <div id="Datos2">
                    <form action="Mantenedores/ProductosEditar.php" method="post" name="frmProductos">
                        <fieldset>Datos Productos
                        <table border="0">
                            <tr>
                                <td style="height: 50px; width: 20px"></td>
                                <td>Marca:</td>
                                <td>
                                    <select name="selecmarca">
                                        <option value="">Seleccionar</option>
                                        <?php 
                                        $sql="select * from marcas";
                                        $result=mysql_query($sql,$cn);
                                        while ($row1=mysql_fetch_array($result))
                                           { if ($row["idmarcas"]==$row1["idmarcas"])
                                            {echo "<option value=".$row1[idmarcas]." selected> ".$row1[marcas]." </option>";}
                                            else
                                            {echo "<option value=".$row1[idmarcas]." > ".$row1[marcas]." </option>";}
                                           }
                                        ?>
                                    </select>
                                </td>
                                <td style="width: 50px"></td>
                                <td>Categoria:</td>
                                <td>
                                    <select name="seleccategoria" id="seleccategoria" onchange="filtrar_subcategorias();">
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
                                <td style="width: 50px"></td>
                                <td>SubCategoria:</td>
                                <td><div id="subcategoria" style="width:auto; float:left">
                                    <select name="selecsubcategoria">
                                        <?php 
                                        $sql="select * from subcategorias";
                                        $result=mysql_query($sql,$cn);
                                        while ($row1=mysql_fetch_array($result))
                                           { if ($row["idsubcategorias"]==$row1["idsubcategorias"])
                                            {echo "<option value=".$row1[idsubcategorias]." selected> ".$row1[subcategorias]." </option>";}
                                            else
                                            {echo "<option value=".$row1[idsubcategorias]." > ".$row1[subcategorias]." </option>";}
                                           }
                                        ?>
                                    </select></div><div id="cargando" style="width:auto; float:left"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Producto:</td>
                                <td style="height: 40px"><input type="hidden"  value="<?php echo $row["idproductos"];?>" name="idproductos" /><input type="text" value="<?php echo $row["productos"];?>" name="txtdescripro" size="30" placeholder="Descripcion del Producto"></td>
                                <td style="width: 50px"></td>
                                <td>Modelo:</td>
                                <td><input type="text" name="txtmodpro" value="<?php echo $row["modelo"];?>" size="30" placeholder="Modelo del Producto"></td>
                                <td style="width: 50px"></td>
                                <td>Serie:</td>
                                <td><input type="text" name="txtseriepro" value="<?php echo $row["serie"];?>" size="30" placeholder="Serie del Producto"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Unidad de Medida:</td>
                                <td style="height: 40px"><input type="text" value="<?php echo $row["unidad"];?>" name="txtunidad" size="30" placeholder="Unidad de Medida"></td>
                                <td style="width: 50px"></td>  
                                <td>Precio Costo:</td>
                                <td><input type="text" name="txtpreciocosto" value="<?php echo $row["pcosto"];?>" size="20" placeholder="Precio Costo S/."></td>
                                <td style="width: 50px"></td>
                                <td>Precio Venta:</td>
                                <td><input type="text" name="txtprecioventa" value="<?php echo $row["pventa"];?>" size="20" placeholder="Precio Venta S/."></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="height: 40px">Cantidad:</td>
                                <td><input type="text" name="txtstockactual" size="5" placeholder=" 1 " disabled /></td>
                                <td colspan="6"></td>
                            </tr>
                        </table>
                        </fieldset>    
                        <br>
                        <table align="center">
                            <tr>
                                <td><input type="submit" value="Actualizar" id="Modificar"></td>
                                <td><a onclick="javascript:location.href='Productos.php'">
                              <input type="button" value="Salir" id="Salir"></a></td>
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
