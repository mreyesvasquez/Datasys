<?php
    require_once("Conexion/Conexion.php");
    $cn = Conectarse();
    $idcategorias=$_POST['idcategorias'];
    $rssubcategorias="select subcategorias,idsubcategorias from subcategorias where idcategorias='$idcategorias'";
    $subcategorias = mysql_query($rssubcategorias);
?>
 <select name="selecsubcategoria">
    <option value="">Seleccionar</option>
           <?php while ($rssubcategorias=mysql_fetch_array($subcategorias)) {?>
           <option value="<?php echo $rssubcategorias['idsubcategorias'] ?>">
           <?php echo $rssubcategorias['subcategorias'] ?></option>
           <?php } ?>
 </select>

