/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validarLetras(e) { // i
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; // backspace
    if (tecla==32) return true; // espacio
    if (e.ctrlKey && tecla==86) { return true;} //Ctrl v
    if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
    if (e.ctrlKey && tecla==88) { return true;} //Ctrl x
 
    patron = /[a-zA-Z]/; //patron
 
    te = String.fromCharCode(tecla);
    return patron.test(te); // prueba de patron
  }
  
  function validarEmail(e)
  {
      tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; // backspace
    if (tecla==32) return true; // espacio
    if (e.ctrlKey && tecla==86) { return true;} //Ctrl v
    if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
    if (e.ctrlKey && tecla==88) { return true;} //Ctrl x
 
    patron = /[0-9a-zA-Z-@._]/; //patron
 
    te = String.fromCharCode(tecla);
    return patron.test(te); // prueba de patron
  }
  function validarNumeros(e)
  {

    teclaNumero = (document.all) ? e.keyCode : e.which;
    if (teclaNumero==8) return true;
    
    patronNumeros= /[0-9]/;
    te2 = String.fromCharCode(teclaNumero);
    return patronNumeros.test(te2);
  }
  
  function validarCorreo(email) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (expr.test(email))
    {
        return true;
    }
    return false;
  } 
  
   function validarContrasena(pass) {
    expr= /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/ ;
    if (expr.test(pass))
    {
        return true;
    }
    else{
        return false;
    }
    
  } 
  
  function validarCampos(formulario)
  {
      
       if(formulario.nombre.value.length==0) 
       {  
            formulario.nombre.focus();    
            alert('Por favor, ingrese el nombre');  
            return false;  
       }
       
       if(formulario.nombre.value.length<3) 
       {  
            formulario.nombre.focus();    
            alert('Nombre muy corto');  
            return false;  
       }
              
       if(formulario.apellido.value.length==0) 
       {  
            formulario.apellido.focus();    
            alert('Por favor, ingrese los apellidos');  
            return false;  
        }
        
        if(formulario.apellido.value.length<3) 
        {  
            formulario.apellido.focus();    
            alert('Apellido muy corto');  
            return false;  
        }
              
       if(formulario.correo.value.length==0) 
       {  
            formulario.correo.focus();    
            alert('Por favor, ingrese el correo');  
            return false;  
        }
        
       if(!validarCorreo(formulario.correo.value))
       {
           formulario.correo.focus();
          alert('Ingrese un direccion correcta del correo');
          return false;
       }
              
       if(formulario.contrasena1.value.length==0) 
       {  
            formulario.contrasena1.focus();    
            alert('Por favor, ingrese la contrasena');  
            return false;  
       }
        
       if(!validarContrasena(formulario.contrasena1.value))
       {
           formulario.contrasena1.focus();
          alert('Ingrese una contraseña segura, debe tener como minimo 8 caracteres y como maximo 15, al menos una letra mayuscula, una minuscula, un numero y un caracter especial');
          return false;
       }
       
              
       if(formulario.contrasena2.value.length==0) 
       {  
            formulario.contrasena2.focus();    
            alert('Por favor, ingrese la verificacion de contrasena');  
            return false;  
       }
       if((formulario.contrasena1.value) != (formulario.contrasena2.value))
       {
          formulario.contrasena2.focus();
          alert('La contraseña y la verificacion de la contraseña deben coincidir');
          return false;
       }
      
      
     
      return true;
  }
  
  function validarCampo(formulario)
  {
      
    
  }
  
