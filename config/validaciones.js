/*
autor: Willian Mendieta y Darwin león
fecha: 25/05/2021
*/

function validarCamposObligatorios(){
    var bandera =true;
    for(var i=0; i<document.forms[0].elements.length;i++){
        var elemento = document.forms[0].elements[i];
        if(elemento.value == '' && elemento.type == 'text' && elemento.type == 'password'){
            if(elemento.id == 'cedula'){
                //propiedad innerHTML> añade texto dentro de la etiqueta span
                document.getElementById('mensajeCedula').innerHTML ='<br>La cédula esta vacia'
            }
            if(elemento.id == 'nombres'){
                document.getElementById('mensajeNombres').innerHTML ='<br>Los nombres estan vacios'
            }
            if(elemento.id == 'apellidos'){
                document.getElementById('mensajeApellidos').innerHTML ='<br>Los apellidos estan vacios'
            }
            if(elemento.id == 'direccion'){
                document.getElementById('mensajeDireccion').innerHTML ='<br>La dirección esta vacia'
            }
            if(elemento.id == 'fechaN'){
                document.getElementById('mensajeFecha').innerHTML ='<br>La fecha de nacimiento esta vacia'
            }
            if(elemento.id == 'correo'){
                document.getElementById('mensajeCorreo').innerHTML ='<br>El correo esta vacio'
            }
            if(elemento.type == 'password'){
                document.getElementById('mensajePass').innerHTML ='<br>La contraseña esta vacia'
            }
            if(elemento.name =='select'){
                document.getElementById('mensajeRol').innerHTML = '<br>El rol esta vacio'
            }

            elemento.style.border ='1px red solid'
            elemento.className='error'
            bandera=false
        }
    }
    
    if(!bandera){
        alert('Error: Complete todos los campos')
    }

    return bandera

}

// Funcion Validar Solo 10 Numeros
function validarNumeros(elemento){
    if(elemento.value.length>0){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
        console.log(miAscii)
        if(miAscii >=48 && miAscii <= 57){ //valida solo numeros entre 0 y 9
            if(elemento.value.length >=11){ //valida no mas de 10 numeros sino elimina
                elemento.value = elemento.value.substring(0, elemento.value.length-1)
                telefono(elemento);
            }else{
                cedulaEcu(elemento); //envia el numero a comprobar si es una cedula valida
            }
            return true
        }else{
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
            return false
        }
    }else{
        return false
    }
}

// Validar Cedula ecuatoriana
function cedulaEcu(elemento){
    var cad = document.getElementById("cedula").value.trim();
    var total = 0;
    var longitud = cad.length;
    var longcheck = longitud - 1;

    if (cad !== "" && longitud === 10){
        for(i = 0; i < longcheck; i++){
        if (i%2 === 0) {
            var aux = cad.charAt(i) * 2;
            if (aux > 9) aux -= 9;
            total += aux;
        } else {
            total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
        }
        }

        total = total % 10 ? 10 - total % 10 : 0;

        if (cad.charAt(longitud-1) == total) {
        document.getElementById("mensajeCedula").innerHTML = 'Cedula Correcta';
        return true;//
        }else{
        document.getElementById("mensajeCedula").innerHTML = ("Cedula Inválida");
        }
    }
}

//telefono
function telefono(elemento){
    return true
}

//Funcion validar ingrese solo letras
function validarLetras(elemento){
    if(elemento.value.length>0){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
        console.log(miAscii);
        //controla letras minusculas        letras mayusculas               espacio
        if(miAscii >=97 && miAscii <= 122 || miAscii >=65 && miAscii <=90 || miAscii ==32){
           //return true
            validarN() //validar si tienen dos nombres
            validarA() //validar si tiene dos apellidos
            return true;
        }else{
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
            return false
        }
    }else{
        return true
    }
}

//Funcion validar 2 nombres
function validarN(){
    var cadena = document.getElementById('nombres').value.trim();
    var long = cadena.length;
    var cont =0;
    
    for(i =0;i<=long;i++){
        var aux = cadena.charCodeAt(i);
        if(aux ==32){
            cont++;
        }
    }

    if(cont != 1){
        document.getElementById("mensajeNombres").innerHTML = ("Ingrese dos nombres");
    }else{
        document.getElementById("mensajeNombres").innerHTML = '';
        return true;
    }
}

//Funcion validar 2 apellidos
function validarA(){
    var cadena = document.getElementById('apellidos').value.trim();
    var long = cadena.length;
    var cont =0;
    
    for(i =0;i<=long;i++){
        var aux = cadena.charCodeAt(i);
        if(aux ==32){
            cont++;
        }
    }

    if(cont != 1){
        document.getElementById("mensajeApellidos").innerHTML = ("Ingrese dos apellidos");
    }else{
        document.getElementById("mensajeApellidos").innerHTML = '';
        return true;
    }
}

//Funcion validar fecha
function validarFecha(){
    var fecha = document.getElementsByName("fechaN")[0].value;
    var fecha = fecha.split("/");
    var dia = fecha[0];
    var mes = parseInt(fecha[1])-1;
    var ano = fecha[2];
    var dato = new Date(ano,mes,dia);

    if(dato.getMonth()!=mes || dato.getUTCDate() !=dia){
        document.getElementById("mensajeFecha").innerHTML=("Ingrese la fecha dd/mm/yyyy");
    }else {
        document.getElementById("mensajeFecha").innerHTML = '';
        return true;
    }
}

//Funcion validar correo
function validarCorreo(elemento){
    if(elemento.value.length >2){
        document.getElementById('mensajeCorreo').innerHTML=''
        var pos = elemento.value.indexOf('@')
        if(pos != -1){
            var dominio = elemento.value.substring(pos + 1, elemento.value.length)
            if((dominio == 'est.ups.edu.ec') || (dominio =='ups.edu.ec')){
                return true
            }else{
                document.getElementById('mensajeCorreo').innerHTML ='Dominios validos: est.ups.ed.ec ; ups.edu.ec'
            }
        }else {
            document.getElementById('mensajeCorreo').innerHTML ="Dominios validos: est.ups.ed.ec ; ups.edu.ec "
        }
    }else{
        document.getElementById('mensajeCorreo').innerHTML ="Correo no válido"
    }

    if(elemento.value.length ==0){
        document.getElementById('mensajeCorreo').innerHTML =''
        //return true;
    }
}

function validarPass(elemento){
    if(elemento.value.length>0){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
        console.log(miAscii);
        
        if(miAscii >=65 && miAscii <=90 &&  miAscii >=97 && miAscii <= 122 || miAscii ==64 || miAscii==36 || miAscii ==95){
            if(elemento.value.length >=7){
                document.getElementById('mensajePass').innerHTML=''
                return true;
            }else{
                document.getElementById('mensajePass').innerHTML='Debe contener mas de 7 caracteres'
            }
            return true
        }else{
            document.getElementById('mensajePass').innerHTML='La contraseña debe contener: Mg@r_h$'
            return false
        }
    }else{
        return false
    }
    //return true
}

function rol(){
    indice = document.getElementById("select").selectedIndex;
    if( indice == null || indice == 1 ) {
        document.getElementById('mensajeRol').innerHTML = ("Seleccione un rol");
        return false;
    }else{
        return true;
    }
    
}

function tipo(){
    indice = document.getElementById("selectT").selectedIndex;
    if( indice == null || indice == 1 ) {
        document.getElementById('mensajeTipo').innerHTML = ("Seleccione un tipo de telefono");
        return false;
    }else{
        return true;
    }
    
}
