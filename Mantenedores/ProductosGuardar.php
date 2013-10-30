<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $marcas=$_GET['selecmarca'];
    $categorias=$_GET['seleccategoria'];
    $subcategorias=$_GET['selecsubcategoria'];
    $producto=strtoupper($_GET['txtdescripro']);
    $modelo=strtoupper($_GET['txtmodpro']);
    $serie=strtoupper($_GET['txtseriepro']);
    $unidad=strtoupper($_GET['txtunidad']);
    $costo=strtoupper($_GET['txtpreciocosto']);
    $venta=strtoupper($_GET['txtprecioventa']);
    $rsproductos="insert into productos(productos,modelo,serie,unidad,pcosto,pventa,stockactual,
        estado,idcategorias,idmarcas,idsubcategorias) value('$producto','$modelo','$serie','$unidad','$costo','$venta','1','A','$categorias','$marcas','$subcategorias')";
    $insertar= mysql_query($rsproductos);
    header("Location: ../Productos.php")
?>
