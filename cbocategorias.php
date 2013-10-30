<?php
    require_once("Conexion/Conexion.php");
    $cn = Conectarse();
    $idmarcas=$_POST['idmarcas'];
    $rscategorias="select categorias,idcategorias from categorias where idmarcas='$idmarcas'";
    $categorias = mysql_query($rscategorias);
?>
<script>
    function filtrar_subcategorias()
        { var idcategorias=document.getElementById("seleccategoria").value;
         $("#cargando").show();
         document.getElementById("cargando").innerHTML='<div align=center><img src=Imagenes/images/anim.gif /></div>';

         $.post("cboSubCategorias.php",{

          idcategorias:idcategorias
         },
         function(data){

          $("#subcategoria").html(data);
          $("#cargando").hide();
            });
        }
</script>
<select name="seleccategoria" id="seleccategoria" onchange="filtrar_subcategorias();">
    <option value="">Seleccionar</option>
        <?php while ($rscategorias=mysql_fetch_array($categorias)) {?>
        <option value="<?php echo $rscategorias['idcategorias'] ?>">
        <?php echo $rscategorias['categorias'] ?></option>
        <?php } ?>
</select>

