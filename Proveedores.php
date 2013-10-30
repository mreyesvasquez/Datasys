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
                        ADMINISTRACI&Oacute;N DE PROVEEDORES
                    </fieldset>  
                </div>
                <div id="Datos">
                    <form action="Proveedores.php" method="post">
                        <fieldset>
                        <table Style="width: 100%" border="0" >
                            <tr>
                                <td Style="height: 40px; width: 30px"></td>
                                <td align="right">Ingrese Razon Social o Ruc del Proveedor: </td>
                                <td><input type="text" name="txtBuscar" size="50" value="<?php echo @$_POST['txtBuscar'] ; ?>" placeholder="Razon Social o Ruc" /></td>
                            </tr>    
                        </table>
                        </fieldset>    
                        <br>
                        <table align="center">
                            <tr>
                                <td><input type="submit" value="Buscar" id="Buscar"></td>
                                <td><a onclick="javascript:location.href='ProveedoresDatos.php'"><input type="button" value="Nuevo" id="Nuevo"></a></td>
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
                        $rsproveedores="select idproveedores,razon, ruc, representante, dni, concat(telefono,' / ',celular)as telefonos,
                        direccion, email from proveedores where razon like '$buscar%' or ruc like '$buscar%'";
                        $proveedores = mysql_query($rsproveedores);
                    ?>
                    <table align="center" border="0" CELLSPACING="5" CELLPADDING="2" style="width: 100%;font-size: 12px;font-family: verdana;background: #c0c0c0;">
                        <tr>
                            <th id="estilo">EDITAR</th>
                            <th id="estilo">RAZON SOCIAL</th>
                            <th id="estilo">RUC</th>
                            <th id="estilo">REPRESENTANTE LEGAL</th>
                            <th id="estilo">DNI</th>
                            <th id="estilo">TELEFONOS</th>
                            <th id="estilo">DIRECCI&Oacute;N</th>
                            <th id="estilo">EMAIL</th>
                        </tr>
                        <?php
                        while ($rsproveedores = mysql_fetch_array($proveedores)){
                        ?>
                        <tr style="background: #f0f0f0;">
                            <th><a href="ProveedoresDatosEditar.php?id=<?php echo $rsproveedores["idproveedores"]; ?>" class="enlace" >Editar</a></th>
                            <td ><?php echo $rsproveedores["razon"] ?></td>
                            <td ><?php echo $rsproveedores["ruc"] ?></td>
                            <td ><?php echo $rsproveedores["representante"] ?></td>
                            <td ><?php echo $rsproveedores["dni"] ?></td>
                            <td ><?php echo $rsproveedores["telefonos"] ?></td>
                            <td ><?php echo $rsproveedores["direccion"] ?></td>
                            <td ><?php echo $rsproveedores["email"] ?></td>
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