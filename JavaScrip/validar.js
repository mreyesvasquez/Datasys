function validarMarcas(){
 
    var Marca=document.frmMarcas.txtmarcas;
    
    if (Marca.value.length==0)
        {alert('Debe Ingresar Marca'); Marca.focus(); return; }
        
frmMarcas.submit(); 
}

function validarCategorias(){
 
    var Categoria=document.frmCategorias.txtcategorias;
    
    if (Categoria.value.length==0)
        {alert('Debe Ingresar Categoria'); Categoria.focus(); return; }
        
frmCategorias.submit(); 
}

function validarSubCategorias(){
 
    var selecsubcateg=document.frmSubCategorias.selecsubcateg;
    var SubCategoria=document.frmSubCategorias.txtsubcategoria;
    
    if (selecsubcateg.value.length==0)
        {alert('Debe Seleccionar Categoria'); selecsubcateg.focus(); return; }
        
    if (SubCategoria.value.length==0)
        {alert('Debe Ingresar SubCategoria'); SubCategoria.focus(); return; }
        
frmSubCategorias.submit(); 
}

function validarClientes(){
 
    var tipoper=document.frmClientes.tipoper; 
    var sexo=document.frmClientes.sexo;
    var txtrazon=document.frmClientes.txtrazon;
    var txtnom=document.frmClientes.txtnom; 
    var txtpater=document.frmClientes.txtpater;
    var txtmater=document.frmClientes.txtmater;
    var tipdoc=document.frmClientes.tipdoc;
    var txtdoc=document.frmClientes.txtdoc;
    var txtdireccion=document.frmClientes.txtdireccion;
    var txttelefono=document.frmClientes.txttelefono;
    
    
    if (tipoper.value.length==0)
        {alert('Debe Seleccionar Tipo de Persona'); tipoper.focus(); return; }
    
    if (tipoper.selectedIndex==1)
       {
           sexo.focus();
           if(sexo.value.length==0)
               {
                   alert('Debe Seleccionar Sexo'); sexo.focus(); return;
               }
           if(txtnom.value.length==0)
               {
                   alert('Debe Ingresar Nombre'); txtnom.focus(); return;
               }
           if(txtpater.value.length==0)
               {
                   alert('Debe Ingresar Apellido Paterno'); txtpater.focus(); return;
               }
           if(txtmater.value.length==0)
               {
                   alert('Debe Ingresar Apellido Materno'); txtmater.focus(); return;
               }
           if(tipdoc.value.length==0)
               {
                   alert('Debe Seleccionar Tipo Documento'); tipdoc.focus(); return;
               }
           if(txtdoc.value.length==0)
               {
                   alert('Debe Ingresar Numero de Dcoumento'); txtdoc.focus(); return;
               }
           if(txtdireccion.value.length==0)
               {
                   alert('Debe Ingresar Direccion'); txtdireccion.focus(); return;
               }
           if(txttelefono.value.length==0)
               {
                   alert('Debe Ingresar Numero de Referencia'); txttelefono.focus(); return;
               }    
       }
       
    if (tipoper.selectedIndex==2)
      {
           if(txtrazon.value.length==0)
              {
                  alert('Debe Ingresar Razon Social'); txtrazon.focus(); return;
              }
           if(tipdoc.value.length==0)
               {
                   alert('Debe Seleccionar Tipo Documento'); tipdoc.focus(); return;
               }
           if(txtdoc.value.length==0)
               {
                   alert('Debe Ingresar Numero de Dcoumento'); txtdoc.focus(); return;
               }
           if(txtdireccion.value.length==0)
               {
                   alert('Debe Ingresar Direccion'); txtdireccion.focus(); return;
               }
           if(txttelefono.value.length==0)
               {
                   alert('Debe Ingresar Numero de Referencia'); txttelefono.focus(); return;
               }     
      } 
frmClientes.submit(); 
}

function validarProductos(){
 
    var selecmarca=document.frmProductos.selecmarca;
    var seleccategoria=document.frmProductos.seleccategoria;
    var selecsubcategoria=document.frmProductos.selecsubcategoria;
    var txtdescripro=document.frmProductos.txtdescripro;
    var txtmodpro=document.frmProductos.txtmodpro;
    var txtseriepro=document.frmProductos.txtseriepro;
    var txtunidad=document.frmProductos.txtunidad;
    var txtpreciocosto=document.frmProductos.txtpreciocosto;
    var txtprecioventa=document.frmProductos.txtprecioventa;
    
    if (selecmarca.value.length==0)
        {alert('Debe Seleccionar Marca'); selecmarca.focus(); return; }
        
    if (seleccategoria.value.length==0)
        {alert('Debe Seleccionar Categoria'); seleccategoria.focus(); return; }
    
    if (selecsubcategoria.value.length==0)
        {alert('Debe Seleccionar Sub-Categoria'); selecsubcategoria.focus(); return; }
        
    if (txtdescripro.value.length==0)
        {alert('Debe Ingresar Descripcion del Producto'); txtdescripro.focus(); return; }
        
    if (txtmodpro.value.length==0)
        {alert('Debe Ingresar Modelo del Producto'); txtmodpro.focus(); return; }
    
    if (txtseriepro.value.length==0)
        {alert('Debe Ingresar Serie del Producto'); txtseriepro.focus(); return; }
    
    if (txtunidad.value.length==0)
        {alert('Debe Ingresar Unidad de Medida'); txtunidad.focus(); return; }
    
    if (txtpreciocosto.value.length==0)
        {alert('Debe Ingresar Precio Costo'); txtpreciocosto.focus(); return; 
        }
        
    if (txtprecioventa.value.length==0)
        {alert('Debe Ingresar Precio Venta'); txtprecioventa.focus(); return; }
frmProductos.submit(); 
}

function validarTrabajadores(){
 
    var txtnombres=document.frmTrabajadores.txtnombres;
    var txtpaterno=document.frmTrabajadores.txtpaterno;
    var txtmaterno=document.frmTrabajadores.txtmaterno;
    var txtdni=document.frmTrabajadores.txtdni;
    var txtdireccion=document.frmTrabajadores.txtdireccion;
    var txttelefono=document.frmTrabajadores.txttelefono;
    var txtemail=document.frmTrabajadores.txtemail;
    var cbocargos=document.frmTrabajadores.cbocargos;
    var txtusuario=document.frmTrabajadores.txtusuario;
    var txtpasword=document.frmTrabajadores.txtpasword;
    
    if (txtnombres.value.length==0)
        {alert('Debe Ingesar Nombres'); txtnombres.focus(); return; }
        
    if (txtpaterno.value.length==0)
        {alert('Debe Ingresar Apellido Paterno'); txtpaterno.focus(); return; }
    
    if (txtmaterno.value.length==0)
        {alert('Debe Ingesar Apellido Materno'); txtmaterno.focus(); return; }
        
    if (txtdni.value.length==0)
        {alert('Debe Ingresar Numero de Documento'); txtdni.focus(); return; }
        
    if (txtdireccion.value.length==0)
        {alert('Debe Ingesar Direccion'); txtdireccion.focus(); return; }
        
    if (txttelefono.value.length==0)
        {alert('Debe Ingresar Numero Telefonico'); txttelefono.focus(); return; }
        
    if (txtemail.value.length==0)
        {alert('Debe Ingesar Email'); txtemail.focus(); return; }
        
    if (cbocargos.value.length==0)
        {alert('Debe Seleccionar Cargo'); cbocargos.focus(); return; }    
    
    if (txtusuario.value.length==0)
        {alert('Debe Ingesar Usuario'); txtusuario.focus(); return; }
        
    if (txtpasword.value.length==0)
        {alert('Debe Ingresar Password'); txtpasword.focus(); return; } 
frmTrabajadores.submit(); 
}