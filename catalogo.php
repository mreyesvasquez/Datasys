<?php
include("Conexion/Conexion.php");
$cn = Conectarse();
@session_start();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}
if(isset($_SESSION['carro']))
	$carro=$_SESSION['carro'];
else
   $carro=false;

@$criterio=trim($_POST["criterio"]);
$rsproducto="select idproductos,p.productos, m.marcas, c.categorias, s.subcategorias,p.pcosto, p.pventa , p.stockactual,p.estado
                        from productos as p, marcas as m, categorias as c, subcategorias as s 
                        where p.idmarcas=m.idmarcas and p.idcategorias=c.idcategorias and p.idsubcategorias=s.idsubcategorias
                        and productos like '$criterio%' and (p.estado='A') order by idproductos"; 
$producto = mysql_query($rsproducto);
if(mysql_num_rows($producto)<1)
 {echo "<br/><br/><div align=center><h1 class=fila1><strong>No se encontro Registros</strong></h1></div>"; exit;}
?>
<table width="100%" align='center' cellspacing='0' id='tabla_listado' style='border:0px solid #000000;'>
<?php
  $i=0;
   while($rsproducto=mysql_fetch_array($producto))
      {   $i++;
			if($i%2==0)
				$clase="fila2";
			else 
				$clase="fila1"; 
?>
 <tr class="<?php echo $clase; ?>" onMouseOver="this.className='sombra'" onMouseOut="this.className='<?php echo $clase; ?>'">
  <td width="5%" align="center"><?php echo $rsproducto['idproductos'] ; ?></td>
  <td width="25%" align="left"><?php echo $rsproducto['productos'] ; ?></td>
  <td width="15%" align="left"><?php echo $rsproducto['marcas'] ;?></td>
  <td width="20%" align="left"><?php echo $rsproducto['categorias'] ;?></td>
  <td width="15%" align="left"><?php echo $rsproducto['subcategorias'] ;?></td>
  <td width="10%" align="center">&nbsp; <input  name="lblStock"  type="hidden" id="lblStock<?php echo $rsproducto['idproductos'];?>"   style="text-align:center" onkeyup="javascript:ActualizarCantidadProducto(<?php echo $v['idproductos'];?>)" value="<?php echo $rsproducto['stockactual'] ?>"  /><?php echo $rsproducto['stockactual'] ;?></td>
  <td width="9%" align=center>&nbsp;<?php echo $rsproducto['pventa'] ;?></td>
  <td width="10%" align=left>
    <?php
	if(!$carro || !isset($carro[md5($rsproducto['idproductos'])]['identificador']) || $carro[md5($rsproducto['idproductos'])]['identificador']!=md5($rsproducto['idproductos'])){
	?>
    <a style="text-decoration:underline;cursor:pointer;" onclick="javascript:enviarDatosProducto(<?php echo $rsproducto['idproductos'];?>)"><img src="Imagenes/images/productonoagregado.gif" width="20" height="20" border="0" align="absmiddle" title="Agregar este producto"></a><?php }
	else
	{?><a style="text-decoration:underline;cursor:pointer;" onclick="javascript:borrarcartlista(<?php echo $rsproducto['idproductos'];?>)"><img src="Imagenes/images/productoagregado.gif" width="20" height="20" border="0" align="absmiddle" title="Quitar este producto"></a><?php } ?> </td>
  
 <?php }?>
</table>
 <br/>
<span  class="fila1"> Registros Encontrados:&nbsp;</span>&nbsp;
              <strong class="asterisco">  <?php echo mysql_num_rows($producto); ?></strong><br/><br/>
<?php 
ob_end_flush();
?>