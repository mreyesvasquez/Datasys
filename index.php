<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="Stylos/login.css" rel="stylesheet" type="text/css">
        <link href="Stylos/formato.css" rel="stylesheet" type="text/css">
        <link href="Stylos/menu.css" rel="stylesheet" type="text/css">
        <link href="Stylos/eggplant/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css">
        
        <script type="text/javascript" src="JavaScrip/jquery-1.8.2.js"></script>
        <script type="text/javascript" src="JavaScrip/jquery-ui-1.9.0.custom.js"></script>
		<script language="javascript" src="JavaScrip/fecha_hora.js" type="text/javascript" ></script>
		
        
        <title>Login</title>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $("#btnIngresar").click(function(){
                        var usuario = $("#usuario").val();
                        var contra = $("#contraseña").val();
                        if(usuario==""){
                            $("#mensaje1").fadeIn();
                            return false;
                        }else{
                            $("#mensaje1").fadeOut();
                            if(contra==""){
                                $("#mensaje2").fadeIn();
                                return false;
                            }   
                        }
                    });
                    $("#btnCancelar").click(function(){
                        $("#mensaje1").fadeOut();
                        $("#mensaje2").fadeOut();
                    });
            });
        </script>
    </head>
    <body>
        <div id="todo">            
                <div id="">
                    <div id="contenedor" class="ui-corner-all">
                        <div id="cont-form" class="ui-corner-all">
                            <form action="Login/Login.php" method="post" class="form-login">
                                <table border="0" cellpadding="8" width="380px" aling="center">
                                    <tr>
                                        <th rowspan="4" class="ui-widget-content ui-corner-all">
                                            <img src="Imagenes/Iconos/users.png">
                                        </th>
                                    </tr>
                                    <tr class="ui-widget-header">
                                        <th colspan="2">ACCESO AL SISTEMA</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>Usuario:</label><br>
                                            <input type="text" id="usuario" name="txtUsuario" placeholder="p.e: juan"><br>
                                            <div id="mensaje1" class="errores">Ingrese Usuario</div><br>

                                            <label>Contraseña:</label><br>
                                            <input type="password" id="contraseña" name="txtContra" placeholder="contraseña"><br>
                                            <div id="mensaje2" class="errores">Ingrese Contraseña</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <button type="submit" id="btnIngresar" name="contraseña" >Ingresar</button>
                                            <button type="reset" id="btnCancelar" name="contraseña" >Cancelar</button>
                                        </th>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
        </div>       
    </body>
</htmL>