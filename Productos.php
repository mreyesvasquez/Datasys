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
    
    $rscategorias="select c.categorias, c.idcategorias from categorias as c";
    $categorias = mysql_query($rscategorias);
    
    $rssubcategorias="select s.subcategorias, s.idsubcategorias from subcategorias as s";
    $subcategorias = mysql_query($rssubcategorias);
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Sistema de Inventario</title>
        <link href="Stylos/formato.css" rel="stylesheet" type="text/css">
        <link href="Stylos/menu.css" rel="stylesheet" type="text/css">
        <link href="Stylos/iconos.css" rel="stylesheet" type="text/css">
        <script language="javascript" src="Js/validar.js" type="text/javascript" ></script>
	<script language="javascript" src="JavaScrip/fecha_hora.js" type="text/javascript" ></script>
		
    </head>
    <body>
        <div id="todo">
            <div id="banner">
                <div id="Bienvenido">
                    <strong><hr><center>BIENVENIDO:</center></hr></strong>
                    <br/>
                    <p align="center"><?php echo strtoupper($_SESSION['usuNombres'].' '.$_SESSION['usuPaterno'].' '.$_SESSION['usuMaterno'])?></p>
                </div>
            </div>
            <div id="menu">
                <?php include('Menus/Menu.php');?>
            </div>
            <div id="cuerpo">
                <br>
                <div id="titulos">
                    <fieldset>
                        ADMINISTRACI&Oacute;N DE PRODUCTOS
                    </fieldset>
                </div>
                <div id="Datos">
                    <form action="Productos.php"  method="post">
                    <fieldset>
                    <table border="0">
                        <tr>
                            <td Style="height:40px; width: 30px"></td>
                            <td>Producto a Buscar:</td>
                            <td><input type="text" name="txtBuscar" size="100" value="<?php echo @$_POST['txtBuscar'] ; ?>" placeholder=" Ingrese Nombre &oacute; Marcas &oacute; Categorias"></td>
                            <td style="width: 50px"></td>
                        </tr>
                    </table>
                    </fieldset>    
                    <br>
                    <table align="center">
                        <tr>
                            <td><input type="submit" value="Buscar" id="Buscar"></td>
                            <td><a href="ProductosDatos.php"><input type="button" value="Nuevo" id="NuevoProducto"></a></td>
                            <td><input type="reset" value="Limpiar" id="Limpiar"></td>
                        </tr>
                    </table> 
                    </form>
                </div>
                <div id="MostrarDatos">
                    <?php
                        $buscar=@$_POST["txtBuscar"];
                        $idmarcas=@$_POST["idmarcas"];
                        $rsproductos="select p.idproductos, p.productos, m.marcas, c.categorias, s.subcategorias,p.pcosto, p.pventa , p.stockactual,p.estado
                        from productos as p, marcas as m, categorias as c, subcategorias as s 
                        where p.idmarcas=m.idmarcas and p.idcategorias=c.idcategorias and p.idsubcategorias=s.idsubcategorias
                        and (p.estado='A') and(p.stockactual>='1')and (p.productos like '$buscar%' or m.marcas like '$buscar%' or c.categorias like '$buscar%' )";
                        $productos = mysql_query($rsproductos);
                    ?>
                    <table align="center" border="0" CELLSPACING="5" CELLPADDING="2" style="width: 100%;font-size: 12px;font-family: verdana;background: #c0c0c0;">
                        <tr>
                            <th id="estilo">EDITAR</th>
                            <th id="estilo">PRODUCTO</th>
                            <th id="estilo">MARCA</th>
                            <th id="estilo">CATEGORIA</th>
                            <th id="estilo">SUBCATEGORIA</th>
                            <th id="estilo">PRECIO COSTO</th>
                            <th id="estilo">PRECIO VENTA</th>
                            <th id="estilo">CANTIDAD</th>
                        </tr>
                        <?php
                        while ($rsproductos = mysql_fetch_array($productos)){
                        ?>
                        <tr style="background: #f0f0f0;">
                            <th><div align="center"><a href="ProductosDatosEditar.php?id=<?php echo $rsproductos["idproductos"] ?>" class="enlace">Editar</a></div></th>
                            <td ><?php echo $rsproductos["productos"] ?></td>
                            <td ><?php echo $rsproductos["marcas"] ?></td>
                            <td ><?php echo $rsproductos["categorias"] ?></td>
                            <td ><?php echo $rsproductos["subcategorias"] ?></td>
                            <td ><?php echo $rsproductos["pcosto"] ?></td>
                            <td ><?php echo $rsproductos["pventa"] ?></td>
                            <td align="center"><?php echo $rsproductos["stockactual"] ?></td>
                        <?php } ?>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="pag">  
            </div>
        </div>
    </body>
</html>
<?php } ?>