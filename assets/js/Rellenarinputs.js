function Busqueda()
{
    area=document.getElementById("areaeventos");
    while (!div2.firstChild) 
    {
        area.removeChild(area.firstChild);
    }
}

function Locacion(location)
{
    document.getElementById("url").value= location;
}

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
function OpcFiltros(opcion,vlug,vtipo)
{
    div2=document.getElementById("columna2");
    div3=document.getElementById("columna3");
    while (div2.firstChild) 
    {
        div2.removeChild(div2.firstChild);
    }
    while (div3.firstChild) 
    {
        div3.removeChild(div3.firstChild);
    }
    if(opcion=="nombre")
    {
        div2.insertAdjacentHTML("beforeend",'<input class="event" type="text" name="busqueda" id="busqueda"placeholder="Búsqueda..." onchange="Busqueda(); document.filtroform.submit();">');
    }
    else if(opcion=="lugar")
    {
        div2.insertAdjacentHTML("beforeend","<select id='blugares' name='blugares' onchange='document.filtroform.submit();'><option disabled selected>Seleccione un lugar</option></select>");
        LLenarLugares(vlug);
    }
    else if(opcion=="tipo")
    {
        div2.insertAdjacentHTML("beforeend","<select id='btipos' name='btipos' onchange='document.filtroform.submit();'><option disabled selected>Seleccione un tipo</option></select>");
        LLenarTipos(vtipo);
    }
    else if(opcion=="antiguo")
    {
        document.filtroform.submit();
    }
    else if(opcion=="todos")
    {
        document.filtroform.submit();
    }
}
function LLenarLugares(vlug)
{
    select = document.getElementById('blugares');
    for(indice in vlug)
    {
        select.insertAdjacentHTML("beforeend","<option value='"+vlug[indice]['NombreLugar']+"'>"+vlug[indice]['NombreLugar']+"</option>")
    }
}
function LLenarTipos(vtip)
{
    select = document.getElementById('btipos');
    for(indice in vtip)
    {
        select.insertAdjacentHTML("beforeend","<option value='"+vtip[indice]['Nombre']+"'>"+vtip[indice]['Nombre']+"</option>")
    }
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
        InLugar.value= lugar;
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