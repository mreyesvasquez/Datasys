function search_catalogo_producto(){
    var criterio =document.getElementById("txtcriterio").value;
   document.getElementById("contenidosp").innerHTML='<div align=center><img src=Imagenes/images/preload.gif /></div>';
    $.post("catalogo.php",{
        /*parametros*/
        criterio:criterio
    },
    function(data){
        $("#contenidosp").html(data);
    });
}
function buscar_cliente(){
			var criterio =document.getElementById("txtNroDocumento").value;
			var nrocaracteres=criterio.length;
			document.getElementById("cliente").innerHTML='<div align=center><img src=Imagenes/images/anim.gif /></div>';
			$.post("Ventas_BuscarClientes.php",{criterio:criterio,nrocaracteres:nrocaracteres },
		    function(data){
				$("#cliente").html(data);
			   });
			$("#txtNroDocumento").focus()
		}
		
function cancelar_producto(){
       $.post("ventas_operaciones.php",{accion:"CANCEL"});
}

function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
function IsNumeric(expression) 
	{
	    return (String(expression).search(/^\d+$/) != -1);
}

function enviarDatosProducto(idproductos){
  var Stock=document.getElementById("lblStock"+idproductos).value;
  var cantidad=window.prompt('Ingrese la cantidad','1');
        if (IsNumeric(cantidad) )
			{ while(eval(cantidad)>eval(Stock))
			   {alert("Error: Debe ingresar una cantidad Menor o Igual a = "+Stock);	
				var cantidad=window.prompt('Debe ingresar una cantidad Menor o Igual a = '+Stock,'1');	
				  if(cantidad)
	         	   {        }
				  else
			  	  { return;}
			 }
    	} 
		else
		{return;}

    accion="INS";
	divMensaje=document.getElementById('contenidosp');
	ses_id=document.frmnuevo_movimiento.ses_id.value;
	ajax=objetoAjax();
	ajax.open("GET", "ventas_operaciones.php?"+ses_id+"&idproductos="+idproductos+"&cantidad="+cantidad+"&accion="+accion,true);
	ajax.onreadystatechange=function()
		{ if (ajax.readyState==4) 
	   		{ search_catalogo_producto();}
		}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(null);
 }
 
function ActualizarCantidadProducto(idproductos){
  var cantidad=eval(document.getElementById("Cantidad"+idproductos).value);
  var Stock=eval(document.getElementById("lblStock_Carrito"+idproductos).value);
  var divResultado = document.getElementById('contenidosp');
  
    if (IsNumeric(cantidad) )
  		 {  if(cantidad=='' || cantidad==0 || cantidad==isNaN || cantidad==null)
			  {
				alert("Error: Debe ingresar una cantidad del producto (Ejm: 1,2,3,4,5)");
				document.getElementById("Cantidad"+idproductos).focus();return;
			  }
		 	 if(eval(cantidad)>eval(Stock))
	  			 {alert("Error: Debe ingresar una cantidad Menor o Igual a = "+Stock);	
				document.getElementById("Cantidad"+idproductos).focus();return;
			  } 
		 }
		else
		{alert("Error: Debe ingresar una cantidad del producto (Ejm: 1,2,3,4,5)");
				document.getElementById("Cantidad"+idproductos).focus();return;}
   
  accion="UPD";
 divContenido.innerHTML= '<img  src=Imagenes/images/anim.gif />';
 ses_id=document.frmnuevo_movimiento.ses_id.value;
  ajax=objetoAjax();
  ajax.open("GET", "ventas_operaciones.php?"+ses_id+"&idproductos="+idproductos+"&cantidad="+cantidad+"&accion="+accion,true);
  ajax.onreadystatechange=function()
	{ if (ajax.readyState==4) 
	   		{ divResultado.innerHTML = ajax.responseText
			  document.getElementById("Cantidad"+idproductos).focus();}
	}
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send(null);
 }

function vercarrito(){ 
	divContenido = document.getElementById('contenidosp');
	ses_id=document.frmnuevo_movimiento.ses_id.value;
	ajax=objetoAjax();
	ajax.open("GET", "vercarrito.php?"+ ses_id,true);
	divContenido.innerHTML= '<img  src=Imagenes/images/anim.gif />';
	ajax.onreadystatechange=function()
	{  if (ajax.readyState==4)
		 {	divContenido.innerHTML = ajax.responseText	}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(null)
}

function continuacart(){
	 search_catalogo_producto();
}

function borrarcart(idproductos){
	divResultado = document.getElementById('contenidosp');
	ses_id=document.frmnuevo_movimiento.ses_id.value;
	accion="DEL";
	ajax=objetoAjax();
	ajax.open("GET", "ventas_operaciones.php?"+ses_id+"&idproductos="+idproductos+"&accion="+accion,true);
	divContenido.innerHTML= '<img  src=Imagenes/images/anim.gif />';
	ajax.onreadystatechange=function() 
	{	if (ajax.readyState==4)
		{divResultado.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(null);
}

function borrarcartlista(idproductos){
	divResultado = document.getElementById('contenidosp');
	ses_id=document.frmnuevo_movimiento.ses_id.value;
	accion="DELCAT";
	ajax=objetoAjax();
	ajax.open("GET", "ventas_operaciones.php?"+ses_id+"&idproductos="+idproductos+"&accion="+accion,true);
	ajax.onreadystatechange=function()
	{  if (ajax.readyState==4)
		 { search_catalogo_producto(); 
		 }
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(null);
}

function registrar_movimiento(){
	
    var Rnd = Math.random()*11;
	var NroVenta=document.frmnuevo_movimiento.txtNroVenta;
	var FechaMovimiento=document.frmnuevo_movimiento.txtFechaMovimiento;
	var HoraRegistrada=document.getElementById('hora');
	var divMensaje=document.getElementById('mensaje');
	var NroDocumento=document.getElementById("txtNroDocumento");
		
    var nFechaMovimiento=FechaMovimiento.value.split("/");
	var mFechaMovimiento=nFechaMovimiento[2]+"/"+nFechaMovimiento[1]+"/"+nFechaMovimiento[0];
	
   if (NroVenta.value=='')
      {alert('Ingrese el Nro Venta para realizar la Venta');NroVenta.focus();return;} 
	
   if (FechaMovimiento.value=='')
      {alert('Ingrese la Fecha de Venta');FechaMovimiento.focus();return;} 
 
    if (NroDocumento.value=='')
      {alert('Ingrese el Nro Documento del Cliente');NroDocumento.focus();return;} 
      var IdCliente=document.frmnuevo_movimiento.lblIdCliente.value;
   
  	var mensaje=confirm('Estas Seguro de Registrar la Venta del Producto')
    if (mensaje)
	{  
	
	$.post("ventas_operaciones.php",{
	
		accion:"GUARDAR_MOVIMIENTO",NroVenta:NroVenta.value,FechaMovimiento:mFechaMovimiento,HoraRegistrada:HoraRegistrada.innerHTML,IdCliente:IdCliente,Rnd:Rnd
    },
    function(data){
		  $("#mensaje").html(data);
    });
	}
	else
	{alert('La Venta ha sido Cancelado');
	 $("#mensaje").html(''); NroVenta.value='';
	  cancelar_producto();search_catalogo_producto();}
}
