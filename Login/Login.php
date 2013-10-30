<?php
include('../Conexion/Conexion.php');
session_start();
$txtUsuario = $_POST['txtUsuario'];
$txtContra = $_POST['txtContra'];
$con =  Conectarse();
$query = "SELECT * FROM trabajadores WHERE usuario = '$txtUsuario' AND password = '$txtContra' AND estado='A'";
$result = mysql_query($query);
if($rsusuario = mysql_fetch_array($result)){
    $_SESSION['usuCodigo']=$rsusuario['idtrabajadores'];
    $_SESSION['usuNombres']=$rsusuario['nombres'];
    $_SESSION['usuPaterno']=$rsusuario['paterno'];
    $_SESSION['usuMaterno']=$rsusuario['materno'];
    header('Location: ../principal.php');
}else{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link href="../Stylos/eggplant/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css">
        
        <script type="text/javascript" src="../JavaScrip/jquery-1.8.2.js"></script>
        <script type="text/javascript" src="../JavaScrip/jquery-ui-1.9.0.custom.js"></script>
        
        <title>Login | Error</title>
        
        <script>
            $(document).ready(function() {
                    $("#btnReLogin" ).button();
            });
	</script>
    </head>
    <body>
        <strong class="ui-corner-all ui-state-error">Usuario y/o Contraseña Erroneos</strong>
        <hr>
        <a id="btnReLogin" href="../index.php">Intentar Nuevamente</a>
    </body>
</html>
<?php } ?>
