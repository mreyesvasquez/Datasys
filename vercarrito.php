<?php 
session_start();
error_reporting(E_ALL);
@ini_set('display_errors', '1');

if(isset($_SESSION['carro']))
	$carro=$_SESSION['carro'];
else
	$carro=false;
?>
<?php 
	if($carro){
?>
<table border='0' align='center' cellpadding='0' cellspacing='0' id='tablacarrito'>
  <tr>
    <th width='12'>&nbsp;</th> 
    <th width='119' align="left">Descripcion</th>
    <th width='118' align='left'>Marca</th>
    <th width='154' align='left'>Categoria</th>
	<th width='139' align='left'>Sub Categoria </th>
	<th width='60' align='center'>Precio</th>
	<th width='66' align='center'>Cantidad</th>
	<th width='75' align='center'>Actualizar</th>
    <th width='49' align='center'>Quitar</th>
    <th width='65' align='center'>Importe</th>
  </tr>

  <?php
  $color=array("#ffffff","#edf2f2");
  $contador=0;
  $total=0;
   foreach($carro as $k => $v){
   $importe=$v['cantidad']*$v['pventa'];
   $total=$total+$importe;
   $contador++;
    ?>
    <tr bgcolor="<?php echo $color[$contador%2]; ?>">
      <td width="12" align="left">&nbsp;</td> 
      <td width="119" align="left"><?php echo $v['descripcion'] ?></td>
      <td width="118" align='left'><?php echo $v['marca'] ?></td>
	  <td width="154" align='left'><?php echo $v['categoria'] ?></td>
	  <td width="139" align='left'><?php echo $v['subcategoria'] ?></td>
	  <td width="60" align='center'><?php echo $v['pventa'] ?></td>
      <td width="66" align="center"><input name="text"  type="hidden" id="lblStock_Carrito<?php echo $v['idproducto'];?>"   style="text-align:center"  value="<?php echo $v['stock'] ?>" /><input name="text"  type="text" id="Cantidad<?php echo $v['idproducto'];?>"   class="cajas" style="text-align:center" value="<?php echo $v['cantidad'] ?>" size="2" /></td>
      <td width='75' align="center"><a  style="text-decoration:underline;cursor:pointer;" onclick="javascript:ActualizarCantidadProducto(<?php echo $v['idproducto'];?>)">
	  <img src="Imagenes/images/actualizar.gif" width="20" height="20" border="0" align="absmiddle" / title="Actualizar Cantidad Solicitada"></a></td>
      <td width='49' align="center"><a  style="text-decoration:underline;cursor:pointer;" onclick="javascript:borrarcart(<?php echo $v['idproducto'];?>)"><img src="Imagenes/images/trash.gif" width="12" height="14" border="0" align="absmiddle" title='Quitar este producto' /></a></td>
      <td width='65' align="center"><?php echo number_format($importe,2,".",",");  ?></td>
  </tr>
  <?php }?>
</table>
<form id="formulario4" name="frmtotales" method="post" action="">
<table width="100%" border='0' align='center' cellpadding='0' cellspacing='0'  id='tablacarrito'>
<tr>
  <td width="1023" align="right">Total</td>
  <td align="center"><?php echo number_format($total,2,".",","); ?></td>
</tr>
<tr>
<td align="right">Total Productos:</td>
<td align="center"><input name="totprod" type="text" id="totprod" size="3"  disabled="disabled" maxlength="3" value="<?php echo count($carro); ?>" style="text-align:center" /></td>
</tr>

<tr>
<td align="right">Agregar + productos</td>
<td width="80" align="center"><a  style="text-decoration:underline;cursor:pointer;" onclick="javascript:continuacart()"><img src="Imagenes/images/continuar.gif" width="20" height="20" border="0" align="absmiddle" title='Agregar + productos' /></a></td>
</tr>
</table>
<?php }else{ ?>
<br /><br /><br /><br /><br/><p align="center"><strong>No hay productos seleccionados:::></strong><a style="text-decoration:underline;cursor:pointer;" onclick="javascript:continuacart()"><img src="Imagenes/images/continuar.gif" width="20" height="20" border="0" align="absmiddle" title='Agregar + productos'></a></p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<?php }?>
</form>