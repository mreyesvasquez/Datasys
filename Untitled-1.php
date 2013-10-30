$sql="select nroventa from ventas where nroventa='$NroVenta'";
	    $result=mysql_query($sql,$cn);
		  if (mysql_num_rows($result)>0)
			{echo "El Nro de Venta Ingresado ya Existe Verifique"; exit();}
			
	      $sql="INSERT INTO ventas(nroventa,fechaventa,horaventa,idclientes,idtrabajadores,total,rnd,activo) VALUES('$NroVenta','$FechaMovimiento',
				 '$HoraRegistrada','$IdCliente','$Usuario',20,'$Rnd',1)";
		   $result=mysql_query($sql,$cn);

		   $sql="select idventas from ventas where rnd='$Rnd'";
		   $codigo=mysql_query($sql,$cn);
		   $rsCodigo=mysql_fetch_array($codigo);  
		   $idventas= $rsCodigo["idventas"];
		
			foreach($carro as $k => $v)
				{   $IdProducto=$v['idproducto'];
					$Cantidad=$v['cantidad'];
					$Precio=$v['pventa'];
					$Importe=$Cantidad*$Precio;
					$sql="insert into detalleventas values('$idventas','$IdProducto','$Precio','$Cantidad','$Importe')";   
					$result=mysql_query($sql,$cn);
						
					   $sql="update productos set stockactual=stockactual-".$Cantidad." where idproductos='$IdProducto'";
					   $result=mysql_query($sql,$cn);}
				}
			/*if (!$result )
			   {echo "Error al Registrar al la venta del Producto"; exit();}
			else
			   {echo "La venta del Producto se Registro con Exito";
				echo "<script language=javascript>
					   var nroventa=document.frmnuevo_movimiento.txtNroVenta;
					   nroventa.value='';
					   search_catalogo_producto();
					   </script>";
			   unset($_SESSION['carro']);
			   exit();}*/