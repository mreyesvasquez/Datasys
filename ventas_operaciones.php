<?php
session_start();
include("Conexion/Conexion.php");
$cn = Conectarse();
if($_SESSION['usuCodigo']==""){
    header("Location:index.php");
}
extract($_REQUEST);
$accion=$_REQUEST['accion'];
@$cantidad=$_GET['cantidad'];
@$idproductos=$_GET['idproductos'];

if ($accion=="INS")
{
   if(!isset($cantidad))
   {$cantidad=1;}
   	$qry=mysql_query("select idproductos,p.productos, m.marcas, c.categorias, s.subcategorias,p.pcosto, p.pventa , p.stockactual,p.estado
                      from productos as p, marcas as m, categorias as c, subcategorias as s 
                      where p.idmarcas=m.idmarcas and p.idcategorias=c.idcategorias and p.idsubcategorias=s.idsubcategorias
					  and idproductos=".$idproductos);
	$rsproducto=mysql_fetch_array($qry);
	if(isset($_SESSION['carro']))
	   $carro=$_SESSION['carro'];
	   
	$carro[md5($idproductos)]=
      	array('identificador'=>md5($idproductos),
		'idproducto'=>$rsproducto['idproductos'],
		'marca'=>$rsproducto['marcas'],
		'categoria'=>$rsproducto['categorias'],
	  	'descripcion'=>$rsproducto['productos'],
		'subcategoria'=>$rsproducto['subcategorias'],
		'stock'=>$rsproducto['stockactual'],
		'pventa'=>$rsproducto['pventa'],
	  	'cantidad'=>$cantidad);
	
	$_SESSION['carro']=$carro;
    exit;
}

if ($accion=="UPD")
{
   
   if(!isset($cantidad))
   {$cantidad=1;}
   	$qry=mysql_query("select idproductos,p.productos, m.marcas, c.categorias, s.subcategorias,p.pcosto, p.pventa , p.stockactual,p.estado
                      from productos as p, marcas as m, categorias as c, subcategorias as s 
                      where p.idmarcas=m.idmarcas and p.idcategorias=c.idcategorias and p.idsubcategorias=s.idsubcategorias
					  and idproductos=".$idproductos);
	$rsproducto=mysql_fetch_array($qry);
	if(isset($_SESSION['carro']))
	   $carro=$_SESSION['carro'];
	   
	$carro[md5($idproductos)]=
      	array('identificador'=>md5($idproductos),
		'idproducto'=>$rsproducto['idproductos'],
		'marca'=>$rsproducto['marcas'],
		'categoria'=>$rsproducto['categorias'],
	  	'descripcion'=>$rsproducto['productos'],
		'subcategoria'=>$rsproducto['subcategorias'],
		'stock'=>$rsproducto['stockactual'],
		'pventa'=>$rsproducto['pventa'],
	  	'cantidad'=>$cantidad);
		
	$_SESSION['carro']=$carro;
	 header("Location:vercarrito.php?".SID);
}

if ($accion=="DEL")
{	$carro=$_SESSION['carro'];
	unset($carro[md5($idproductos)]);
	$_SESSION['carro']=$carro;
	header("Location:vercarrito.php?".SID);
}

if ($accion=="DELCAT")
{	$carro=$_SESSION['carro'];
	unset($carro[md5($idproductos)]);
	$_SESSION['carro']=$carro;
	exit;
}
if ($accion=="CANCEL")
{  unset($_SESSION['carro']);  exit;
}

if ($accion=="GUARDAR_MOVIMIENTO")
{   @$NroVenta=$_POST['NroVenta'];
	$FechaMovimiento=$_POST['FechaMovimiento'];
	$HoraRegistrada=$_POST['HoraRegistrada'];
	$IdCliente=$_POST['IdCliente'];
	
	$Usuario=$_SESSION['usuCodigo'];
	
	$Rnd=$_POST['Rnd'];

	if(isset($_SESSION['carro']))
  		$carro=$_SESSION['carro'];
	else
  		$carro=false; 

  	if($carro)
  	{   
	    $sql="select nroventa from ventas where nroventa='$NroVenta'";
	    $result=mysql_query($sql,$cn);
		  if (mysql_num_rows($result)>0)
			{echo "El Nro de Venta Ingresado ya Existe Verifique"; exit();}
			
	      $sql="INSERT INTO ventas(nroventa,fechaventa,horaventa,idclientes,idtrabajadores,rnd,activo) 
		  							VALUES('$NroVenta','$FechaMovimiento','$HoraRegistrada','$IdCliente','$Usuario','$Rnd',1)";
		   $result=mysql_query($sql,$cn);

		   $sql="select idventas from ventas where rnd='$Rnd'";
		   $codigo=mysql_query($sql,$cn);
		   $rsCodigo=mysql_fetch_array($codigo);  
		   $idventas= $rsCodigo["idventas"];
		   $total=0;
			foreach($carro as $k => $v)
				{   $IdProducto=$v['idproducto'];
					$Cantidad=$v['cantidad'];
					$Precio=$v['pventa'];
					$Importe=$v['cantidad']*$v['pventa'];
  					$total=$total+$Importe;
                    
					$sql="update ventas set total='$total' where idventas='$idventas'";
					$result=mysql_query($sql,$cn);
					
					$sql="insert into detalleventas values('$idventas','$IdProducto','$Precio','$Cantidad','$Importe')";   
					$result=mysql_query($sql,$cn);
						
					$sql="update productos set stockactual=stockactual-".$Cantidad." where idproductos='$IdProducto'";
					$result=mysql_query($sql,$cn);
				}
			if (!$result )
			   {echo "Error al Registrar al la venta del Producto"; exit();}
			else
			   {echo "La venta del Producto se Registro con Exito";
				echo "<script language=javascript>
					   var nroventa=document.frmnuevo_movimiento.txtNroVenta;
					   nroventa.value='';
					   search_catalogo_producto();
					   </script>";
			   unset($_SESSION['carro']);
			   exit();}
    } 
     else
    { echo "Agrege Los Productos para realizar la venta" ;}
}
?>