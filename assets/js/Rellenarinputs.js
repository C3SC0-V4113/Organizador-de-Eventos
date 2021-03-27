function Rellenar(Name, Descrip, url)
{
    InName = document.getElementById("nombreE");
    InDescrip = document.getElementById("descripE");

    InName.disabled = false;
    InDescrip.disabled = false;


    InName.value = Name;
    InDescrip.innerHTML = Descrip;
}

/**No se que hacer
 * Pero esto
 * talvez
 * funcione
 * no, no lo hizo
 */

function Limpiar()
{
    InName = document.getElementById("nombreE");
    InDescrip = document.getElementById("descripE");

    InName.value = '';
    InDescrip.innerHTML = '';
}


function Header(titulo,descrip) {
    Titulo = document.getElementById("tituloH");
    Titulo.value = titulo;
    Descrip = document.getElementById("descripH");
    Descrip.innerHTML =descrip;           
}

function LimpiarH(){
    Titulo = document.getElementById("tituloH");
    Titulo.value = '';
    Descrip = document.getElementById("descripH");
    Descrip.innerHTML =''; 
}