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
                <br/>
                <div id="titulos">
                    <fieldset>
                        ADMINISTRACI&Oacute;N DE CLIENTES
                    </fieldset>
                </div>    
                <div id="Datos2">
                    <form action="Mantenedores/ClientesGuardar.php" method="get" name="frmClientes" onSubmit="validarClientes(); return false">
                        <fieldset>Datos de la Persona &oacute; Empresa
                        <table border="0">
                            <tr>
                                <td style="height: 40px; width: 20px"></td>
                                <td>Tipo de Cliente:</td>
                                <td>
                                    <select name="tipoper" onChange="activaCajasConSelect(this)">
                                        <option value="">Seleccionar</option>
                                        <option value="NATURAL">NATURAL</option>
                                        <option value="JURIDICO">JURIDICA</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <table border="0">
                            <tr>
                                <td style="height: 40px; width: 20px"></td>
                                <td>Razon Social:</td>
                                <td style="height: 40px"><input type="text" name="txtrazon" size="40" id="txtrazon" placeholder="Razon Social" disabled></td>
                                <td style="width: 50px"></td>
                                <td>Sexo:</td>
                                <td><select name="sexo" id="sexo" disabled>
                                  <option value="">Seleccionar</option>
                                  <option value="MASCULINO">MASCULINO</option>
                                  <option value="FEMENINO">FEMENINO</option>
                                </select></td>
                                <td style="width: 50px"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="height: 40px"></td>
                                <td>Nombres</td>
                                <td><input type="text" name="txtnom" id="txtnom" size="40" placeholder="Nombre Completo" disabled></td>
                                <td></td>
                                <td>Apellido Paterno:</td>
                                <td><input type="text" name="txtpater" id="txtpater"  placeholder="Apellido Paterno" disabled></td>
                                <td></td>
                                <td>Apellido Materno:</td>
                                <td><input type="text" name="txtmater" id="txtmater"  placeholder="Apellido Materno" disabled></td>
                            </tr>
                            <tr>
                                <td style="height: 40px"></td>
                                <td>Fecha de Nacimiento:</td>
                                <td><input type="date" name="txtfechanac" id="txtfechanac" placeholder="Fecha de Nacimiento" disabled></td>
                                <td></td>
                                <td>Tipo de Documento:</td>
                                <td>
                                    <select name="tipdoc" id="tipdoc" disabled>
                                        <option value="">Seleccionar</option>
                                        <option value="DNI">DNI</option>
                                        <option value="RUC">RUC</option>
                                    </select>                                </td>
                                <td></td>
                                <td>N. Documento:</td>
                            <td><input type="text" name="txtdoc" id="txtdoc"  placeholder="Numero Documento" disabled>                            </tr>
                            <tr>
                                <td></td>
                                <td>Direcci&oacute;n</td>
                                <td style="height: 40px"><input type="text" name="txtdireccion" size="40" id="txtdireccion" placeholder="Direcci&oacute;n" disabled></td>
                                <td></td>
                                <td>Celular:</td>
                                <td><input type="text" name="txtcelular" id="txtcelular" placeholder="Celular" disabled></td>
                                <td></td>
                                <td>Telefono Fijo:</td>
                                <td><input type="text" name="txttelefono" id="txttelefono" placeholder="Telefono Fijo" disabled></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Correo Electronico:</td>
                                <td style="height: 40px"><input type="email" id="email" name="txtemail" size="40" placeholder="Email" disabled></td>
                                <td colspan="6"></td>
                            </tr>
                        </table>
                        </fieldset>
                        <br>
                        <table border="0" align="center">
                            <tr>
                                <td><input type="submit" value="Guardar" id="Save"></td>
                                <td><input type="reset" value="Limpiar" id="Limpiar"></td>
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