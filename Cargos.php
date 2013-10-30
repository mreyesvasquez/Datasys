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
        <link href="Stylos/menu.css" rel="stylesheet" type="text/css">
        <link href="Stylos/iconos.css" rel="stylesheet" type="text/css">
		<script language="javascript" src="JavaScrip/fecha_hora.js" type="text/javascript" ></script>
		<script language="javascript" src="JavaScrip/validar.js" type="text/javascript" ></script>
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
                        MANTENEDOR DE CARGOS
                    </fieldset>    
                </div>
                <div id="Datos">
                    <form action="Mantenedores/CargosGuardar.php" method="get" name="frmCargos" onSubmit="validarCargos(); return false">
                        <fieldset>
                        <table border="0">
                            <tr>
                                <td Style="height: 40px; width: 30px"></td>
                                <td>Cargo:</td>
                                <td><input type="text" name="txtcargos" size="40" placeholder="Ingreso de Nuevos Cargo"></td>
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
                        include("Conexion/Conexion.php");
                        $cn = Conectarse();
                        $rscargos="select cargos, idcargos from cargos";
                        $cargos = mysql_query($rscargos);
                    ?>
                    <table align="center" border="0" CELLSPACING="7" CELLPADDING="7" style="font-size: 12px;font-family: verdana;background: #c0c0c0;">
                        <tr>
                            <TH id="estilo">CODIGO</TH>
                            <TH id="estilo">&nbsp;CARGO</TH>
                            <TH id="estilo">EDITAR</TH>
                        </tr>
                        <?php
                        while ($rscargos = mysql_fetch_array($cargos)){
                        ?>
                        <tr style="background: #f0f0f0;">
                            <th ><?php echo $rscargos["idcargos"] ?></th>
                            <td ><?php echo $rscargos["cargos"] ?></td>
                            <th><div align="center"><a href="CargosEditar.php?id=<?php echo $rscargos["idcargos"] ?>" class="enlace">Editar</a></div></th>
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