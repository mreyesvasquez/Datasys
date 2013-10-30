<?php
session_start();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}else{
    include("Conexion/Conexion.php");
	$cn = Conectarse();
	$idclientes=$_GET['id'];
    $sql="select * from clientes where idclientes='$idclientes'";
    $result= mysql_query($sql);
	$row=mysql_fetch_array($result);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Sistema de Inventario</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="Stylos/formato.css" rel="stylesheet" type="text/css">
        <link href="Stylos/iconos.css" rel="stylesheet" type="text/css">
        <link href="Stylos/menu.css" rel="stylesheet" type="text/css">
        <script language="javascript" src="JavaScrip/validar.js" type="text/javascript" ></script> 
        <script language="javascript" src="JavaScrip/validarcajas.js" type="text/javascript" ></script> 
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
                        ADMINISTRACI&Oacute;N DE CLIENTES
                    </fieldset>
                </div>    
                <div id="Datos2">
                    <form action="Mantenedores/ClientesEditar.php" method="post" name="frmClientes">
                        <fieldset>Datos de la Persona &oacute; Empresa
                        <table border="0">
                            <tr>
                                <td style="height: 40px; width: 20px"></td>
                                <td>Tipo de Cliente:</td>
                                <td>
                                    <select name="tipoper" onChange="activaCajasConSelect(this)">
                                        <?php if ($row["tipoper"]=="JURIDICA")
                                       {?>
                                        <option value="">Seleccionar</option>

                                            <option value="NATURAL">NATURAL</option>
                                            <option value="JURIDICA" selected="selected">JURIDICA</option>
                                      <?php } else
                                      { ?> <option  value="">Seleccionar</option>

                                               <option value="NATURAL" selected="selected">NATURAL</option>
                                                  <option value="JURIDICA">JURIDICA</option>
                                      <?php }?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <table border="0">
                            <tr>
                                <td style="height: 40px; width: 20px"></td>
                                <td>Razon Social:</td>
                                <td style="height: 40px"><input type="hidden"  value="<?php echo $row["idclientes"];?>" name="idclientes" /><input type="text" name="txtrazon" size="40" value="<?php echo $row["razon"];?>" id="txtrazon" placeholder="Razon Social" disabled></td>
                                <td style="width: 50px"></td>
                                <td>Sexo:</td>
                                <td>
								
                                    <select name="sexo" id="sexo" disabled>
                                       <?php if ($row["sexo"]=="MASCULINO")
                                       {?>
                                      <option value="">Seleccionar</option>
                                            <option value="MASCULINO" selected="selected">MASCULINO</option>
                                            <option value="FEMENINO">FEMENINO</option>
                                      <?php } else
                                      { ?> <option  value="">Seleccionar</option>
                                          <option value="MASCULINO">MASCULINO</option>
                                              <option value="FEMENINO" selected="selected">FEMENINO</option>
                                      <?php }?>
                                    </select>
								
                                </td>
                                <td style="width: 50px"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="height: 40px"></td>
                                <td>Nombres</td>
                                <td><input type="text" name="txtnom" id="txtnom" value="<?php echo $row["nombres"];?>" size="40" placeholder="Nombre Completo" disabled></td>
                                <td></td>
                                <td>Apellido Paterno:</td>
                                <td><input type="text" name="txtpater" id="txtpater" value="<?php echo $row["paterno"];?>"  placeholder="Apellido Paterno" disabled></td>
                                <td></td>
                                <td>Apellido Materno:</td>
                                <td><input type="text" name="txtmater" id="txtmater" value="<?php echo $row["materno"];?>" placeholder="Apellido Materno" disabled></td>
                            </tr>
                            <tr>
                                <td style="height: 40px"></td>
                                <td>Fecha de Nacimiento:</td>
                                <td><input type="date" name="txtfechanac" id="txtfechanac" value="<?php echo $row["fechanacimiento"];?>" placeholder="Fecha de Nacimiento" disabled></td>
                                <td></td>
                                <td>Tipo de Documento:</td>
                                <td>
                                    <select name="tipdoc" id="tipdoc" disabled>
                                       <?php if ($row["documento"]=="DNI")
											   {?>
											  <option value="">Seleccionar</option>
												<option value="DNI" selected="selected">DNI</option>
												<option value="RUC">RUC</option>
											  <?php } else
											  { ?> <option  value="">Seleccionar</option>
											      <option value="DNI">DNI</option>
												  <option value="RUC" selected="selected">RUC</option>
											  <?php }?>
                                    </select>
                                </td>
                                <td></td>
                                <td>N. Documento:</td>
                                <td><input type="text" name="txtdoc" id="txtdoc" value="<?php echo $row["numdoc"];?>" placeholder="Numero Documento" disabled>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Direcci&oacute;n</td>
                                <td style="height: 40px"><input type="text" name="txtdireccion" value="<?php echo $row["direccion"];?>" size="40" id="txtdireccion" placeholder="Direcci&oacute;n" disabled></td>
                                <td></td>
                                <td>Celular:</td>
                                <td><input type="text" name="txtcelular" id="txtcelular" value="<?php echo $row["celular"];?>" placeholder="Celular" disabled></td>
                                <td></td>
                                <td>Telefono Fijo:</td>
                                <td><input type="text" name="txttelefono" id="txttelefono" value="<?php echo $row["telefono"];?>" placeholder="Telefono Fijo" disabled></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Correo Electronico:</td>
                                <td style="height: 40px"><input type="email" id="email" value="<?php echo $row["email"];?>" name="txtemail" size="40" placeholder="Email" disabled></td>
                                <td colspan="6"></td>
                            </tr>
                        </table>
                        </fieldset>
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <td><input type="submit" value="Actualizar" id="Modificar"></td>
                                <td><a onclick="javascript:location.href='Clientes.php'"><input type="button" value="Salir" id="Salir"></a></td>
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