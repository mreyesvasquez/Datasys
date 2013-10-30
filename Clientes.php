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
                        ADMINISTRACI&Oacute;N DE CLIENTES
                    </fieldset>
                </div>
                <div id="Datos">
                    <form action="Clientes.php" method="POST" name="">
                        <fieldset>
                        <table border="0" width="100%">
                            <tr>
                                <td width="32" Style="height:40px; width: 30px"></td>
                                <td width="564" align="right">Ingresar Cliente a buscar:</td>
                                <td width="688"><input name="txtBuscar" type="text" id="txtBuscar" size="35" value="<?php echo @$_POST['txtBuscar']; ?>" placeholder=" Ingrese Nombre o Ruc"/></td>
                            </tr>
                        </table>
                        </fieldset>
                        <br>
                        <table align="center">
                            <tr>
                                <td><input type="submit" value="Buscar" id="Buscar"></td>
                                <td><a onclick="javascript:location.href='ClientesDatos.php'"><input type="button" value="Nuevo" id="Nuevo"></a></td>
                                <td><input type="reset" value="Limpiar" id="Limpiar"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div id="MostrarDatos">
                    <?php
                    include("Conexion/Conexion.php");
                    $cn = Conectarse();
                    $buscar=@$_POST["txtBuscar"];
                    $rsclientes="select idclientes,concat(nombres,' ',paterno,' ',materno,'',razon) as Persona,
                    tipoper,concat(documento,' - ',numdoc) as documentos, direccion,
                    concat(telefono,' / ',celular) as telefonos, email
                    from clientes where concat(nombres,' ',paterno,' ',materno) like '$buscar%' or numdoc like '$buscar%' 
					or razon like '$buscar%'";
                    $clientes = mysql_query($rsclientes);
                    ?>
                    <table align="center" border="0" width="100%" CELLSPACING="5" CELLPADDING="2" style="font-size: 12px;font-family: verdana;background: #c0c0c0;">
                        <tr>
                            <th id="estilo">EDITAR</th>
                            <th id="estilo">CLIENTE</th>
                            <th id="estilo">TIPO DE CLIENTE</th>
                            <th id="estilo">DOCUMENTO</th>
                            <th id="estilo">DIRECCI&Oacute;N</th>
                            <th id="estilo">TELEFONOS</th>
                            <th id="estilo">EMAIL</th>
                        </tr>
                        <?php
                        while ($rsclientes = mysql_fetch_array($clientes)){
                        ?>
                        <tr style="background: #f0f0f0;">
                            <th><div align="center"><a href="ClientesDatosEditar.php?id=<?php echo $rsclientes["idclientes"] ?>" class="enlace">Editar</a></div></th>
                            <td ><?php echo $rsclientes["Persona"] ?></td>
                            <td ><?php echo $rsclientes["tipoper"] ?></td>
                            <td ><?php echo $rsclientes["documentos"] ?></td>
                            <td ><?php echo $rsclientes["direccion"] ?></td>
                            <td ><?php echo $rsclientes["telefonos"] ?></td>
                            <td ><?php echo $rsclientes["email"] ?></td>
							
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