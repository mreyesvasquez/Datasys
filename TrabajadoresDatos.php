<?php
session_start();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}else{
?>
<?php
    include("Conexion/Conexion.php");
    $cn = Conectarse();
    $rscargos="select cargos, idcargos from cargos";
    $cargos = mysql_query($rscargos);
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
        
        <link href="Stylos/estilo_calendario.css" rel="stylesheet" type="text/css">	
        <script language="javascript" src="JavaScrip/java_calendario.js" type="text/javascript" ></script>
        
        <script language="javascript" src="JavaScrip/jquery-1.8.2.js" type="text/javascript" ></script>
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
                        ADMINISTRACI&Oacute;N DE TRABAJADORES
                    </fieldset>
                </div>
                <div id="Datos2">
                    <form action="Mantenedores/TrabajadoresGuardar.php" method="get" name="frmTrabajadores" onSubmit="validarTrabajadores(); return false">
                        <fieldset>Datos de la Persona
                        <table border="0">
                            <tr>
                                <td style="height: 50px; width: 20px"></td>
                                <td>Nombres:</td>
                                <td><input type="text" name="txtnombres" size="30" placeholder="Nombres"></td>
                                <td style="width: 50px"></td>
                                <td>Apellido Paterno:</td>
                                <td><input type="text" name="txtpaterno" size="15" placeholder="Apellido Paterno"></td>
                                <td style="width: 50px"></td>
                                <td>Apellido Materno:</td>
                                <td><input type="txt" name="txtmaterno" size="15" placeholder="Apellido Materno"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>DNI:</td>
                                <td style="height: 40px"><input type="text" name="txtdni" size="15" placeholder="DNI"></td>
                                <td></td>
                                <td>Direcci&oacute;n</td>
                                <td><input type="text" name="txtdireccion" size="30" placeholder="Direccion"></td>
                                <td></td>
                                <td>Telefono:</td>
                                <td><input type="text" name="txttelefono" size="15" placeholder="Telefono"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Fecha de Nacimiento:</td>
                                <td style="height: 40px">
                                    <input name="txtdate"  placeholder="Fecha de Nacimiento" id="txtfechaInicio" readonly="true" class="cajas" type="text"  size="15" maxlength="11" value="<?php echo date('Y/m/d')?>" onKeyUp="mascara(this,'/',patron,true)" title="El separador de fecha '/' se inserta automaticamente"/>
                                    <a onClick="displayCalendar(document.forms[0].txtfechaInicio,'yyyy/mm/dd',this)" style="cursor:pointer" title="ver Calendario"><img  src="Imagenes/images/calendario.jpg"  name="imgCalendario" width="25" height="22" hspace="0" vspace="0" border="0" align="absmiddle" id="imgCalendario" /></a>
                                </td>
                                <td></td>
                                <td>Correo Electronico:</td>
                                <td><input type="email" name="txtemail" size="30" placeholder="Email"></td>
                                <td></td>
                                <td>Cargo:</td>
                                <td>
                                    <select name="cbocargos">
                                        <option value="">Seleccionar</option>
                                        <?php while ($rscargos=mysql_fetch_array($cargos)) {?>
                                        <option value="<?php echo $rscargos['idcargos'] ?>">
                                        <?php echo $rscargos['cargos'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Usuario:</td>
                                <td style="height: 40px"><input type="text" name="txtusuario" size="15" placeholder="Usuario"></td>
                                <td></td>
                                <td>Password:</td>
                                <td><input type="password" name="txtpasword" size="15" placeholder="Ingresar Password"></td>
                                <td></td>
                                <td colspan="2"></td>
                            </tr>
                        </table>
                        </fieldset>    
                        <br>
                        <table align="center">
                            <tr>
                                <td><input type="submit" value="Guardar" id="Save"></td>
                                <td><input type="reset" value="Limpiar" id="Limpiar"></td>
                                <td><a onclick="javascript:location.href='Trabajadores.php'"><input type="button" value="Salir" id="Salir"></a></td>
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