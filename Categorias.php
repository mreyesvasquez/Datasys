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
<html>
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
                        MANTENEDOR DE CATEGORIAS
                    </fieldset>
                </div>
                <div id="Datos">
                    <form action="Mantenedores/CategoriasGuardar.php" method="get" name="frmCategorias" onSubmit="validarCategorias(); return false">
                        <fieldset>
                        <table border="0">
                            <tr>
                                <td Style="height: 40px; width: 30px"></td>
                                <td>Categoria:</td>
                                <td><input type="text" name="txtcategorias" size="50" placeholder=" Ingresar Nuevas Categoria"></td>
                                <td style="width: 100px"></td>
                                <td>Marca:</td>
                                <td>
                                    <select name="selecmarca">
                                        <option value="">Seleccionar</option>
                                        <?php while ($rsmarcas=mysql_fetch_array($marcas)) {?>
                                        <option value="<?php echo $rsmarcas['idmarcas'] ?>">
                                        <?php echo $rsmarcas['marcas'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        </fieldset>    
                        <br>
                        <table align="center">
                            <tr>
                                <td><input type="submit" value="Guardar" id="Save"></td>
                                <td><input type="reset" value="Limpiar" id="Limpiar"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div id="MostrarDatos">
                    <?php
                    $rscategorias="select c.idcategorias,c.categorias, m.marcas
                    from categorias as c, marcas as m
                    where m.idmarcas=c.idmarcas order by c.idcategorias desc";
                    $categorias = mysql_query($rscategorias);
                    ?>
                    <table align="center" border="0" CELLSPACING="7" CELLPADDING="7" style="font-size: 12px;font-family: verdana;background: #c0c0c0;">
                        <tr>
                            <TH id="estilo">CODIGO</TH>
                            <TH id="estilo">&nbsp;CATEGORIA</TH>
                            <TH id="estilo">&nbsp;MARCA</TH>
                            <TH id="estilo">EDITAR</TH>
                        </tr>
                        <?php
                        while ($rscategorias = mysql_fetch_array($categorias)){
                        ?>
                        <tr style="background: #f0f0f0;">
                            <td ><?php echo $rscategorias["idcategorias"] ?></td>
                            <td ><?php echo $rscategorias["categorias"] ?></td>
                            <td ><?php echo $rscategorias["marcas"] ?></td>
                            <th><div align="center"><a href="CategoriasEditar.php?id=<?php echo $rscategorias["idcategorias"] ?>" class="enlace">Editar</a></div></th>
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