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
                        ADMINISTRACI&Oacute;N DE TRABAJADORES
                    </fieldset> 
                </div>
                <div id="Datos">
                    <form action="Trabajadores.php" method="post">
                        <fieldset>
                        <table border="0" >
                            <tr>
                                <td Style="height: 40px; width: 30px"></td>
                                <td>Ingrese Trabajador a Buscar:</td>
                                <td style="width: 20px"></td>
                                <td><input type="text" name="txtBuscar" value="<?php echo @$_POST['txtBuscar'] ; ?>" size="50" placeholder="Nombre Completo o DNI"</td>
                                
                            </tr>
                        </table>
                        </fieldset>    
                        <br>
                        <table align="center">
                            <tr>
                                <td><input type="submit" value="Buscar" id="Buscar"></td>
                                <td><a href="TrabajadoresDatos.php"><input type="button" value="Nuevo" id="Nuevo"></a></td>
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
                    $rspersonal="select t.idtrabajadores, concat(t.nombres,' ',t.paterno,' ',t.materno) as Personal, t.dni,t.direccion,
                    t.estado,t.telefono,t.fechanacimiento,t.email,c.cargos
                    from trabajadores as t,cargos as c
                    where t.idcargos=c.idcargos and t.estado='A' and (concat(t.nombres,' ',t.paterno,' ',t.materno)like'$buscar%' or (t.dni)like'$buscar%')";
                    $personal = mysql_query($rspersonal);
                    ?>
                    <table align="center" border="0" CELLSPACING="5" CELLPADDING="2" style="width: 100%; font-size: 12px;font-family: verdana;background: #c0c0c0;">
                        <tr>
                            <th id="estilo">EDITAR</th>
                            <th id="estilo">CARGO</th>
                            <th id="estilo">PERSONAL</th>
                            <th id="estilo">DNI</th>
                            <th id="estilo">DIRECCI&Oacute;N</th>
                            <th id="estilo">TELEFONOS</th>
                            <th id="estilo">FECHA DE NACIMIENTO</th>
                            <th id="estilo">EMAIL</th>
                            <th id="estilo">ACTIVO</th>
                        </tr>
                        <?php
                        while ($rspersonal = mysql_fetch_array($personal)){
                        ?>
                        <tr style="background: #f0f0f0;">
                            <th><div align="center"><a href="TrabajadoresDatosEditar.php?id=<?php echo $rspersonal["idtrabajadores"] ?>" class="enlace">Editar</a></div></th>
                            <td ><?php echo $rspersonal["cargos"] ?></td>
                            <td ><?php echo $rspersonal["Personal"] ?></td>
                            <td ><?php echo $rspersonal["dni"] ?></td>
                            <td ><?php echo $rspersonal["direccion"] ?></td>
                            <td ><?php echo $rspersonal["telefono"] ?></td>
                            <td ><?php echo $rspersonal["fechanacimiento"] ?></td>
                            <td ><?php echo $rspersonal["email"] ?></td>
                            <td align="center"><?php echo $rspersonal["estado"] ?></td>
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