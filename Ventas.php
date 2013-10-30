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
		<link href="Stylos/estilo_calendario.css" rel="stylesheet" type="text/css">
		
		<script language="javascript" src="JavaScrip/jquery-1.8.2.js" type="text/javascript" ></script>
		
		<script language="javascript" src="JavaScrip/java_calendario.js" type="text/javascript" ></script>
		
		<script>
		function filtrar_fechas()
		{ var feinicio=document.getElementById("txtfechaInicio").value;
		 var fefinal=document.getElementById("txtfechafinal").value;
		 alert(feinicio);
		 alert(fefinal);
		 $("#cargando").show();
		 document.getElementById("cargando").innerHTML='<div align=center><img src=Imagenes/images/anim.gif /></div>';
          
           $.post("ventas_buscar_fechas.php",{
		      
              feinicio:feinicio,fefinal:fefinal
   			 },
    		function(data){
			 
       	      $("#MostrarDatos").html(data);
			  $("#cargando").hide();
    		});
			}
		</script>
		
	 
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
                        ADMINISTRACI&Oacute;N DE VENTAS
                    </fieldset>
                </div>
                <div id="Datos">
                    <form action="Ventas.php" method="post">
                        <fieldset>
                        <table border="0" >
                            <tr>
                                <td style="height: 40px; width: 30px"></td>
                                <td>Cliente a Buscar:</td>
                                <td><input name="txtBuscar" type="text" id="txtBuscar"  size="60" value="<?php echo @$_POST['txtBuscar'] ; ?>" placeholder=" Ingrese Nombre del Cliente &oacute; Nro Documento del Cliente"></td>
                                <!--<td style="width: 40px"></td>
                                <td>fecha Inicio
                                  <input name="txtfechaInicio"  id="txtfechaInicio" readonly="true" class="cajas" type="text"  size="15" maxlength="11" value="<?php echo date('Y/m/d')?>" onKeyUp="mascara(this,'/',patron,true)" title="El separador de fecha '/' se inserta automaticamente"/>
                                    <a onClick="displayCalendar(document.forms[0].txtfechaInicio,'yyyy/mm/dd',this)" style="cursor:pointer" title="ver Calendario"><img  src="Imagenes/images/calendario.jpg"  name="imgCalendario" width="25" height="22" hspace="0" vspace="0" border="0" align="absmiddle" id="imgCalendario" /></a></td>
                                <td>fecha final : 
                                  <input name="txtfechafinal"  id="txtfechafinal" readonly="true" class="cajas" type="text"  size="15" maxlength="11" value="<?php echo date('Y/m/d')?>" onKeyUp="mascara(this,'/',patron,true)" title="El separador de fecha '/' se inserta automaticamente"/>
                                    <a onClick="displayCalendar(document.forms[0].txtfechafinal,'yyyy/mm/dd',this)" style="cursor:pointer" title="ver Calendario"><img  src="Imagenes/images/calendario.jpg"  name="imgCalendario" width="25" height="22" hspace="0" vspace="0" border="0" align="absmiddle" id="imgCalendario" />
                                    </a><input type="button" name="Submit"  onclick="filtrar_fechas()" value="consultar" /></td>
                                -->
                            </tr>
                        </table>
                        </fieldset>    
                        <br>
                        <table align="center">
                            <tr>
                                <td><input type="submit" value="Buscar" id="Buscar"></td>
                                <td><a onclick="javascript:location.href='VentasDatos.php'"><input type="button" value="Nuevo" id="NuevoProducto"></a></td>
                                <td><input type="reset" value="Limpiar" id="Limpiar"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div id="MostrarDatos">
				<div id="cargando" style="width:auto; float:left"></div>
				 <?php
                        include("Conexion/Conexion.php");
                        $cn = Conectarse();
                        $buscar=@$_POST['txtBuscar'];
                        $rsventas="select idventas,nroventa,fechaventa,concat(nombres,' ',paterno,' ',materno,' ',razon) as cliente
                        ,direccion,numdoc,total from ventas v inner join clientes c on v.idclientes=c.idclientes
                         where concat(nombres,' ',paterno,' ',materno) like '$buscar%'
                         or razon like '$buscar%' or numdoc like '$buscar%'";
                        $ventas = mysql_query($rsventas);
                    ?>
                    <table align="center" border="0" CELLSPACING="5" CELLPADDING="2" style="width: 100%;font-size: 12px;font-family: verdana;background: #c0c0c0;">
                        <tr>
                            <th id="estilo">VER</th>
                            <th id="estilo">N. DOCUMENTO</th>
                            <th id="estilo">CLIENTE</th>
                            <th id="estilo">FECHA DE VENTA</th>
                            <th id="estilo">DIRECCION</th>
                            <th id="estilo">Monto</th>
                        </tr>
			<?php
                            while ($rsventas = mysql_fetch_array($ventas)){
                        ?>
                        <tr style="background: #f0f0f0;">
				<th ><div align="center"><a href="VentasDetalle.php?id=<?php echo $rsventas["idventas"] ?>" class="enlace">Ver</a></div></th>
                                <td ><?php echo $rsventas["nroventa"] ?></td>
                                <td ><?php echo $rsventas["cliente"] ?></td>
                                <td ><?php echo $rsventas["fechaventa"] ?></td>
   				<td ><?php echo $rsventas["direccion"] ?></td>
				<td ><?php echo $rsventas["total"] ?></td>   
                        <?php } ?>
                    </table>
                </div>
            </div>
            <div id="pag">  
            </div>
        </div>
    </body>
</html>
<?php } ?>