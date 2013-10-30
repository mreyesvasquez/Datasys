<?php
session_start();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}else{
?>
<?php
    include("Conexion/Conexion.php");
    $cn = Conectarse();
    $rscategorias="select c.categorias, c.idcategorias from categorias as c";
    $categorias = mysql_query($rscategorias);
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
                        MANTENEDOR DE SUBCATEGORIAS
                    </fieldset> 
                </div>
                <div id="Datos">
                    <form action="Mantenedores/SubCategoriasGuardar.php" method="post" name="frmSubCategorias" onSubmit="validarSubCategorias(); return false">   
                        <fieldset>
                        <table border="0">
                            <tr>
                                <td Style="height: 40px; width: 30px"></td>
                                <td>Categoria:</td>
                                <td>
                                    <select name="selecsubcateg">
                                        <option value="">Seleccionar</option>
                                        <?php while ($rscategorias=mysql_fetch_array($categorias)) {?>
                                        <option value="<?php echo $rscategorias['idcategorias'] ?>">
                                        <?php echo $rscategorias['categorias'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td style="width: 100px"></td>
                                <td>SubCategoria:</td>
                                <td><input type="text" name="txtsubcategoria" size="50" placeholder="Ingresar Nueva Sub-Categoria"></td>
                                
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
                        $rssubcategorias="select s.idsubcategorias, s.subcategorias, c.categorias
                        from subcategorias as s, categorias as c
                        where s.idcategorias=c.idcategorias order by s.idsubcategorias desc";
                        $subcategorias = mysql_query($rssubcategorias);
                    ?>
                    <table align="center" border="0" CELLSPACING="7" CELLPADDING="7" style="font-size: 12px;font-family: verdana;background: #c0c0c0;">
                        <tr style="background: #c0c0c0;">
                            <TH id="estilo">&nbsp;CATEGORIA</TH>
                            <TH id="estilo">SUBCATEGORIA</TH>
                            <TH id="estilo">EDITAR</TH>
                        </tr>

                        <?php
                        while ($rssubcategorias = mysql_fetch_array($subcategorias)){
                        ?>
                        <tbody>
                            <tr style="background: #f0f0f0;">
                                <td ><?php echo $rssubcategorias["categorias"] ?></td>
                                <td ><?php echo $rssubcategorias["subcategorias"] ?></td>
                                <th><div align="center"><a href="SubCategoriasEditar.php?id=<?php echo $rssubcategorias["idsubcategorias"] ?>" class="enlace">Editar</a></div></th>
                            <?php } ?>
                            </tr>
                        </tbody>   
                    </table>
                </div>
            </div>
            <div id="pag">  
            </div>
        </div>
    </body>
</html>
<?php } ?>