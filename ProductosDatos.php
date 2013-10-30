<?php
session_start();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}else{
?>
<?php
    include("Conexion/Conexion.php");
    $cn = Conectarse();
    $rsmarcas="select m.marcas, m.idmarcas from marcas as m";
    $marcas = mysql_query($rsmarcas);
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
            function filtrar_categorias()
                    {
                        var idmarcas=document.getElementById("selecmarca").value;
                        $("#cargando").show();
                        document.getElementById("cargando").innerHTML='<div align=center><img src=Imagenes/images/anim.gif /></div>';
                        $.post("cbocategorias.php",{

                      idmarcas:idmarcas
                     },
                     function(data){

                      $("#categorias").html(data);
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
                <br/>
                <div id="titulos">
                    <fieldset>
                        ADMINISTRACI&Oacute;N DE PRODUCTOS
                    </fieldset>
                </div>
                <div id="Datos2">
                    <form action="Mantenedores/ProductosGuardar.php" method="get" name="frmProductos" onSubmit="validarProductos(); return false">
                        <fieldset>Datos Productos
                        <table border="0">
                            <tr>
                                <td style="height: 50px; width: 20px"></td>
                                <td>Marca:</td>
                                <td>
                                    <select name="selecmarca" id="selecmarca" onchange="filtrar_categorias();">
                                        <option value="">Seleccionar</option>
                                        <?php while ($rsmarcas=mysql_fetch_array($marcas)) {?>
                                        <option value="<?php echo $rsmarcas['idmarcas'] ?>">
                                        <?php echo $rsmarcas['marcas'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td style="width: 50px"></td>
                                <td>Categoria:</td>
                                <td>
                                    <div id="categorias" style="width:auto; float:left">
                                    <select name="seleccategoria">
                                        <option value="">Seleccionar</option>
                                    </select>
                                    </div><div id="cargando" style="width:auto; float:left"></div>
                                </td>
                                <td style="width: 50px"></td>
                                <td>SubCategoria:</td>
                                <td>
                                    <div id="subcategoria" style="width:auto; float:left">
                                    <select name="selecsubcategoria">
                                        
                                    </select>
                                    </div>
                                    <div id="cargando" style="width:auto; float:left"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Producto:</td>
                                <td style="height: 40px"><input type="text" name="txtdescripro" size="30" placeholder="Descripcion del Producto"></td>
                                <td style="width: 50px"></td>
                                <td>Modelo:</td>
                                <td><input type="text" name="txtmodpro" size="30" placeholder="Modelo del Producto"></td>
                                <td style="width: 50px"></td>
                                <td>Serie:</td>
                                <td><input type="text" name="txtseriepro" size="30" placeholder="Serie del Producto"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Unidad de Medida:</td>
                                <td style="height: 40px"><input type="text" name="txtunidad" size="30" placeholder="Unidad de Medida"></td>
                                <td style="width: 50px"></td>  
                                <td>Precio Costo:</td>
                                <td><input type="text" name="txtpreciocosto" size="20" placeholder="Precio Costo S/."></td>
                                <td style="width: 50px"></td>
                                <td>Precio Venta:</td>
                                <td><input type="text" name="txtprecioventa" size="20" placeholder="Precio Venta S/."></td>
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
                                <td><input type="submit" value="Guardar" id="Save"></td>
                                <td><input type="reset" value="Limpiar" id="Limpiar"></td>
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