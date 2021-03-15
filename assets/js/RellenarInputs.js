function RellenarS(Name, Descrip, Icono)
{
    InName = document.getElementById("nombreS");
    InURL = document.getElementById("urlIcon");
    EtiquetaI = document.getElementById("iconos");
    InDescrip = document.getElementById("descripS");

    InName.disabled = false;
    InDescrip.disabled = false;

    EtiquetaI.className = Icono;
    InName.value = Name;
    InDescrip.innerHTML = Descrip;
    InURL.value = Icono;
}

function Limpiar()
{
    InName = document.getElementById("nombreS");
    InDescrip = document.getElementById("descripS");
    EtiquetaI = document.getElementById("iconos");
    EtiquetaI.className = 'fas fa-archive';
    InName.value = '';
    InDescrip.innerHTML = '';
}

function CambiarImagen()
{
    InURL = document.getElementById("urlS");
    InImage = document.getElementById("imagenS");

    const objectURL = URL.createObjectURL(InURL.files[0]);
    
    InImage.src = '';
    InImage.src = objectURL;
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