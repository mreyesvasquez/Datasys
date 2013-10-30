<?php
session_start();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}else{
    include("Conexion/Conexion.php");
	$cn = Conectarse();
	$idventas=$_GET['id'];
        $sql="select dv.idventas, dv.idproductos, p.productos, dv.precio, dv.cantidad, v.total, 
                        concat(c.nombres,' ',c.paterno,' ',c.materno,' ',razon) as Cliente, c.direccion,
                        c.numdoc
                        from detalleventas as dv,productos as p, ventas as v, clientes as c
                        where dv.idproductos=p.idproductos and v.idventas=dv.idventas and v.idclientes=c.idclientes and dv.idventas='$idventas'";
        $result= mysql_query($sql);
        $sql = mysql_fetch_array($result);
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
            </div>
            <div id="cuerpo">
                <br>
                <div id="titulos">
                    <fieldset>
                        ADMINISTRACI&Oacute;N DE DETALLE VENTAS
                    </fieldset>
                </div>
                <div>
                    <form action="" method="post">
                        <fieldset>
                            <table width="100%" border="0" >
                                <tr>
                                    <td style="height: 40px; width: 30px"></td>
                                    <td align="right">Cliente:</td>
                                    <td><?php echo $sql["Cliente"]?></td>   
                                    <td align="right">Direccion:</td>
                                    <td><?php echo $sql["direccion"]?></td> 
                                    <td align="right">Nro Documento:</td>
                                    <td><?php echo $sql["numdoc"]?></td> 
                                </tr>
                            </table>
                            <table align="center" border="0" CELLSPACING="5" CELLPADDING="2" style="width: 100%;font-size: 12px;font-family: verdana;background: #c0c0c0;" >
                                <tr>
                                    <th id="estilo">CANTIDAD</th>
                                    <th id="estilo">PRODUCTO</th>
                                    <th id="estilo">PRECIO</th>
                                </tr>
                                
                                <tr>
                                    <td><?php echo $sql["cantidad"]?></td>
                                    <td><?php echo $sql["productos"]?></td>
                                    <td><?php echo $sql["precio"]?></td>
                                </tr>
                                
                            </table>
                            <BR/>
                            <table ALIGN="CENTER">
                                <tr>
                                    <td></td>
                                    <TH>MONTO TOTAL: </TH>
                                    <TH><?php echo $sql["total"]?></TH>
                                </tr>
                            </table>
                        </fieldset>    
                        <br>
                        <table align="center">
                            <tr>
                                <td><a onclick="javascript:location.href='Ventas.php'"><input type="button" value="Salir" id="Salir"></a></td>
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