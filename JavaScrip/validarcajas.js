function activaCajasConSelect(obj){
    if(obj.selectedIndex==0)
            {
            document.getElementById('sexo').disabled= true;
            document.getElementById('txtrazon').disabled= true;                            
            document.getElementById('txtnom').disabled= true;
            document.getElementById('txtpater').disabled= true;
            document.getElementById('txtmater').disabled= true;
            document.getElementById('txtfechanac').disabled= true;
            document.getElementById('tipdoc').disabled= true;
            document.getElementById('txtdoc').disabled= true;
            document.getElementById('txtdireccion').disabled= true;
            document.getElementById('txtcelular').disabled= true;
            document.getElementById('txttelefono').disabled= true;
            document.getElementById('email').disabled= true;
            }
        else if(obj.selectedIndex==1)
            {
            document.getElementById('txtrazon').disabled= true; 
            document.getElementById('sexo').disabled= false;
            document.getElementById('txtnom').disabled= false;
            document.getElementById('txtpater').disabled= false;
            document.getElementById('txtmater').disabled= false;
            document.getElementById('txtfechanac').disabled= false;
            document.getElementById('tipdoc').disabled= false;
            document.getElementById('txtdoc').disabled= false;
            document.getElementById('txtdireccion').disabled= false;
            document.getElementById('txtcelular').disabled= false;
            document.getElementById('txttelefono').disabled= false;
            document.getElementById('email').disabled= false;
            }
        else if(obj.selectedIndex==2)
            {
            document.getElementById('sexo').disabled= true;
            document.getElementById('txtnom').disabled= true;
            document.getElementById('txtpater').disabled= true;
            document.getElementById('txtmater').disabled= true;
            document.getElementById('txtrazon').disabled= false;
            document.getElementById('txtfechanac').disabled= false;
            document.getElementById('tipdoc').disabled= false;
            document.getElementById('txtdoc').disabled= false;
            document.getElementById('txtdireccion').disabled= false;
            document.getElementById('txtcelular').disabled= false;
            document.getElementById('txttelefono').disabled= false;
            document.getElementById('email').disabled= false;
            }
}

