 <?php
                        include("Conexion/Conexion.php");
                        $cn = Conectarse();
						$fechainicio=@$_POST['feinicio'];
						$fechafinal=@$_POST['fefinal'];
                        $rsmarcas="select nroventa,fechaventa,concat(nombres,' ',paterno,' ',materno,' ',razon) as cliente
						,direccion,numdoc,total from ventas v inner join clientes c on v.idclientes=c.idclientes
						 where  fechaventa<='$fechainicio' and fechaventa>='$fechafinal'";
                        $marcas = mysql_query($rsmarcas);
                    ?>
                    <table align="center" border="0" CELLSPACING="5" CELLPADDING="2" style="width: 100%;font-size: 12px;font-family: verdana;background: #c0c0c0;">
                        <tr>
                            <th id="estilo">VER</th>
                            <th id="estilo">N. DOCUMENTO</th>
                            <th id="estilo">CLIENTE</th>
                            <th id="estilo">FECHA DE VENTA</th>
                            <th id="estilo">DIRECCION</th>
                            <th id="estilo">Monto</th>
                        </tr>
						 <?php
                        while ($rsmarcas = mysql_fetch_array($marcas)){
                        ?>
                        <tr style="background: #f0f0f0;">
						    <th ></th> 
                             <td ><?php echo $rsmarcas["nroventa"] ?></td>
							 <td ><?php echo $rsmarcas["cliente"] ?></td>
							 <td ><?php echo $rsmarcas["fechaventa"] ?></td>
							
   							 <td ><?php echo $rsmarcas["direccion"] ?></td>
							  <td ><?php echo $rsmarcas["total"] ?></td>
                            
                        <?php } ?>
                    </table>