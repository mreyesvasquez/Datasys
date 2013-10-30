<?php
    include("../Conexion/Conexion.php");
    $cn=Conectarse();
    $idproductos=$_POST['idproductos'];
    $marcas=$_POST['selecmarca'];
    $categorias=$_POST['seleccategoria'];
    $subcategorias=$_POST['selecsubcategoria'];
    $producto=strtoupper($_POST['txtdescripro']);
    $modelo=strtoupper($_POST['txtmodpro']);
    $serie=strtoupper($_POST['txtseriepro']);
    $unidad=strtoupper($_POST['txtunidad']);
    $costo=strtoupper($_POST['txtpreciocosto']);
    $venta=strtoupper($_POST['txtprecioventa']);
    $sminimo=strtoupper($_POST['txtstockminimo']);
    
    $rsproductos="update productos set productos='$producto',modelo='$modelo',serie='$serie',unidad='$unidad',
        pcosto='$costo',pventa='$venta',stockactual='1',
        stockminimo='$sminimo',estado='A',idcategorias='$categorias',idmarcas='$marcas',idsubcategorias='$subcategorias' 
            where idproductos='$idproductos'";
    $insertar= mysql_query($rsproductos);
    header("Location: ../Productos.php")
?>
