function Generar(Vector, Id) {
    Div = document.getElementById("fotitos");
    contenedor = document.getElementById("todasfotos");
    while (Div.firstChild) 
    {
        Div.removeChild(Div.firstChild);
    }
    if (Vector!='Sin imagenes') {
        cont =0;
        contenedor.style.display="block";
        for (indice in Vector)
        {
            if (Vector[indice]['idEventos'] == Id) 
            {
                cont++;
                Div.insertAdjacentHTML("beforeend","<div class='col-4' id='img"+cont+"'><div class='fotos'><img class='im' src='" + Vector[indice]['UrlFoto'] + "'><br><br><span id='name'>Imagen "+(cont)+"</span><br><br><input class='style2' type='button' name='eliminarimagen' id='eliminarimagen' onclick='cancel = true;EliminarImagen("+Vector[indice]['idFotos']+","+cont+")'; value='Borrar Imagen'/><br></div></div>");
                
            }
            else {console.log('nada2'); }
        }
        if(cont ==0)
        {
            contenedor.style.display="none";
        }
        Div.insertAdjacentHTML("beforeend","<input type='hidden' id='numeroFotos' name='numeroFotos' value='"+cont+"' readonly required>");
    }
    else{console.log('nada1');}
}
function EliminarImagen(idfoto,num)
{
    idelemento = "img"+num;
    Elemeto = document.getElementById(idelemento);
    Elemeto.remove();
    Father = document.getElementById('fotitos');
    Father.insertAdjacentHTML('afterbegin',"<input type='hidden' id='eliminado"+num+"' name='eliminado"+num+"' value='"+idfoto+"' readonly required>")
}

function RellenarS(Name, Descrip, Icono, ID)
{
    InName = document.getElementById("nombreS");
    InURL = document.getElementById("Icono");
    InID= document.getElementById("IdServicios");
    EtiquetaI = document.getElementById("iconos");
    InDescrip = document.getElementById("descripS");
    Boton = document.getElementById("modificarS");
    
    if(Icono != 'none' )
    {
        InName.disabled = false;
        InDescrip.disabled = false;
        Boton.disabled = false;
    
        EtiquetaI.className = Icono;
        InName.value = Name;
        InDescrip.innerHTML = Descrip;
        InURL.value = Icono;
        InID.value = ID;
    }
    else
    {

    }
    

}
function RellenarE(Name, Descrip, Cliente, IdE,fecha,lugar,tipo)
{
    InName = document.getElementById("nombreE");
    InCli = document.getElementById("CliE");
    InID= document.getElementById("idEventos");
    Fecha = document.getElementById("FechaE");
    InDescrip = document.getElementById("descripE");
    InLugar = document.getElementById("LugarE");
    InTipo = document.getElementById("TipoE");
    Boton = document.getElementById("modificarE");
    Imagenes = document.getElementById("ImagenesE[]");
    
    if(Cliente != 'none' )
    {
        InName.disabled = false;
        InDescrip.disabled = false;
        InCli.disabled = false;
        Fecha.disabled=false;
        InLugar.disabled=false;
        InTipo.disabled=false;
        Boton.disabled = false;
        Imagenes.disabled = false;
    
        InName.value = Name;
        InDescrip.innerHTML = Descrip;
        InCli.value=Cliente;
        Fecha.value=fecha;
        InLugar.value=lugar;
        InTipo.value = tipo;
        InID.value = IdE;
    }
    else
    {

    }
    

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
function LimpiarE()
{
    InDescrip = document.getElementById("descripE");
    InDescrip.innerHTML = '';
}

function CambiarImagen(idInput)
{
    num = idInput.substr(5);
    idImagen ="img"+num;
    InURL = document.getElementById(idInput);
   
    InImage = document.getElementById(idImagen);

    const objectURL = URL.createObjectURL(InURL.files[0]);
    Cambio = "<input type='hidden' id='idCambio"+num+"' name='idCambio"+num+"' value='"+objectURL+"' readonly required>";
    
    InImage.src = '';
    InImage.src = objectURL;
    InImage.insertAdjacentHTML('beforeend',Cambio);
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
function OnlyID(ID,Nombre,Icono)
{
    InID= document.getElementById("IdServicios");
    Name= document.getElementById("name");
    Boton = document.getElementById("eliminarS");
    if(Icono != 'none' )
    {
        Boton.disabled = false;
        InID.value = ID;
        Name.value = Nombre;
    }
    else
    {

    }
}

function EliminarEvento(ID,Cliente,Nombre)
{
    InID= document.getElementById("idEventos");
    Boton = document.getElementById("EliminarE");
    InName = document.getElementById("nameE");
    if(Cliente != 'none' )
    {
        InID.value = ID;
        Boton.disabled = false;
        InName.value = Nombre;
    }
    else
    {

    }
}

function ellipsis_box(elemento, max_chars){
	limite_text = $(elemento).text();
	if (limite_text.length > max_chars)
	{
	limite = limite_text.substr(0, max_chars)+" ...";
	$(elemento).text(limite);
	}
	}
	$(function()
	{
	ellipsis_box(".limitado", 90);
	});
