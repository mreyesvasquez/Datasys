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
        <link href="Stylos/ventas.css" rel="stylesheet" type="text/css">
        <link href="Stylos/estilo_calendario.css" rel="stylesheet" type="text/css">
		
        <script language="javascript" src="JavaScrip/validar.js" type="text/javascript" ></script>
        <script language="javascript" src="JavaScrip/jquery-1.8.2.js" type="text/javascript" ></script>
        <script language="javascript" src="JavaScrip/ajax_venta_producto.js" type="text/javascript" ></script>
        <script language="javascript" src="JavaScrip/fecha_hora.js" type="text/javascript" ></script>
        <script language="javascript" src="JavaScrip/java_calendario.js" type="text/javascript" ></script>
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
                <div id="titulos" style="float:left; width:100%">
                </div>
                <div id="Datos2" style="overflow:auto; height:auto; float:left">
                    <div id="consultas">
                        <!--
                            <div id="constitulo" align="center">
                            REGISTRO DE VENTAS DE PRODUCTOS </div>
                        -->
                        <form id="formulario3" name="frmnuevo_movimiento" method="post" action="">
                            <table id="tabla3" border="0" align="center" cellspacing="0">
                                <!--
                                <tr>
                                    <td colspan="4" height="25"><div class="asterisco"  align="center" id="mensaje"></div></td>
                                </tr>
                                -->
                                <tr>
                                    <td width="25%" align="left">&nbsp;</td>
                                    <td width="29%" align="right">&nbsp;</td>
                                    <td width="19%" align="right">&nbsp;</td>
                                    <td width="27%" align="right">Nro Venta
                                        <input name="txtNroVenta" class="cajas" type="text" id="txtNroVenta" size="15" maxlength="11" />
                                    </td>
                                </tr>
                                <tr>
                                    <th align="left">Fecha Venta </th>
                                    <th align="left">&nbsp;</th>
                                    <th align="left">&nbsp;</th>
                                    <th align="right">Nro Documento Cliente &nbsp; </th>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle">
                                        <input name="txtFechaMovimiento" readonly="true" class="cajas" type="text"  size="15" maxlength="11" value="<?php echo date('d/m/Y')?>" onKeyUp="mascara(this,'/',patron,true)" title="El separador de fecha '/' se inserta automaticamente"/>
                                        <a onClick="displayCalendar(document.forms[0].txtFechaMovimiento,'dd/mm/yyyy',this)" style="cursor:pointer" title="ver Calendario"><img  src="Imagenes/images/calendario.jpg"  name="imgCalendario" width="25" height="22" hspace="0" vspace="0" border="0" align="absmiddle" id="imgCalendario" />
                                            <input name="ses_id" type="hidden" id="ses_id" size="40" maxlength="50" value="<? echo $SID ?>"/>
                                        </a>
                                    </td>
                                    <td align="left" valign="middle">&nbsp;</td>
                                    <td align="left" valign="middle">&nbsp;</td>
                                    <td align="right" valign="middle"><input name="txtNroDocumento" maxlength="11"  type="text" id="txtNroDocumento">
                                    <input type="button" name="Submit" id="botonform" onClick="buscar_cliente()" value="::"></td>
                                </tr>
                                <tr class="sin">
                                    <td colspan="4" align="left" valign="middle" class="sin"><div id="cliente" style=" width:100%"></div> </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </form>
                        <form name="formulario2" id="formulario2" method="post" action="" onSubmit="search_catalogo_producto(); return false">
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="tabla2">
                                <tr>
                                    <td width="618" align="left">Ingrese descripci&oacute;n del producto:
                                    <input name="txtcriterio" type="text" id="txtcriterio" size="35"  class="cajas" onKeyUp="search_catalogo_producto();" />
                                </tr>
                            </table>
                        </form>
                        <table width="100%" border="1" cellpadding="0" cellspacing="0" id="tabla2_1">
                            <tr valign="middle">
                                <th width="5%" align="center"><strong>ID</strong></th>
                                <th width="25%" align="center"><strong>Descripci&oacute;n</strong></th> 
                                <th width="15%" align="center"><strong>Marca</strong></th>
                                <th width="20%" align="center"><strong>Categoria</strong></th>
                                <th width="15%" align="center"><strong>Sub-Categoria</strong></th>
                                <th width="10%" align="center"><strong>Stock</strong></th>
                                <th width="9%" align="center"><strong>P. Venta</strong></th>
                                <td width="10%" align="center"><a  style="text-decoration:underline;cursor:pointer;" onClick="javascript:vercarrito();" title="Ver productos agregados"><img src="Imagenes/images/cart.png" width="26" height="26" border="0"></a></td>
                            </tr>
                        </table>
                        <div id="contenidosp" align="center"><script> search_catalogo_producto();</script></div>
                        <div id="barra" align="center">
                            <a style="text-decoration:underline;cursor:pointer;" onClick="registrar_movimiento();"><img src="Imagenes/images/save.png" width="50" height="30" border="0" title="Grabar Venta" img /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="pag">&nbsp; </div>
    </body>
</html>
<?php } ?>