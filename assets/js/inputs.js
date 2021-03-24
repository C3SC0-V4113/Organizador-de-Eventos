function Rellenar(Name, Descrip, url)
{
    InName = document.getElementById("nombreE");
    InURL = document.getElementById("urlE");
    InImage = document.getElementById("imagenE");
    InDescrip = document.getElementById("descripE");

    InName.disabled = false;
    InDescrip.disabled = false;
    InURL.disabled = false;

    InName.value = Name;
    InDescrip.innerHTML = Descrip;
    InImage.src = url;
    InURL.value = url;
}

function LimpiarE()
{
    InName = document.getElementById("nombreE");
    InDescrip = document.getElementById("descripE");
    InIcono = document.getElementById("urlIcon");
    v = InIcono.value;
    InIcono.value = v;
    InName.value = '';
    InDescrip.innerHTML = '';
}

function CambiarImagen()
{
    InURL = document.getElementById("urlE");
    InImage = document.getElementById("imagenE");

    const objectURL = URL.createObjectURL(InURL.files[0]);
    
    InImage.src = '';
    InImage.src = objectURL;
}
