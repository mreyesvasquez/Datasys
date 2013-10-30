<?php
include("Conexion/Conexion.php");
$cn = Conectarse();
@session_start();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}
$criterio = trim($_POST["criterio"]);
$nrocaracteres=$_POST["nrocaracteres"];
$rscliente = "SELECT  idclientes,paterno, materno, nombres,razon,telefono, direccion,numdoc FROM clientes where numdoc = '$criterio'";
$cliente = mysql_query($rscliente);
if($rscliente = mysql_fetch_array($cliente)){
     if($nrocaracteres==8)
	 {
     ?>
     <table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			  <th align="left"  width="25%">Apellidos Materno </th>
			  <th align="left" width="29%">Apellidos Paterno </th>
			  <th align="left" width="19%">Nombres</th>
			  <th align="left" width="27%">Direccion </th>
			 </tr>
		  <tr>
			  <td align="left"><input type="hidden" id="lblIdCliente" value="<?php echo $rscliente["idclientes"]; ?>" /><?php echo $rscliente["paterno"]; ?> </td>
			  <td align="left"><?php echo $rscliente["materno"]; ?> </td>
			  <td align="left"><?php echo $rscliente["nombres"]; ?></td>
			  <td align="left">&nbsp;<?php echo $rscliente["direccion"]; ?> </td>
		 </tr>
	 </table>
	 <?php }
	  elseif($nrocaracteres==11)
	  { ?>
	  <table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			  <th align="left"  width="25%">Razon Social </th>
			  <th align="left" width="29%">Telefono </th>
			  <th align="left" width="27%">Direccion </th>
			 </tr>
		  <tr>
			  <td align="left"><input type="hidden" id="lblIdCliente" value="<?php echo $rscliente["idclientes"]; ?>" /><?php echo $rscliente["razon"]; ?> </td>
			  <td align="left"><?php echo $rscliente["telefono"]; ?> </td>
			  <td align="left">&nbsp;<?php echo $rscliente["direccion"]; ?> </td>
		 </tr>
	 </table>
	 <?php } ?>
	 
	  
<?php }
 else 
 { 
  echo "<center>el Nro Documento ingresado no existe en la Data</center>" ;
   /* if($nrocaracteres==8)
     { echo "natura" ;}
     elseif ($nrocaracteres==11)
	 {echo "juridoco";}*/
 } ?>
 
