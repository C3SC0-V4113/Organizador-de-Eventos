window.onload = initForms;

function initForms(){
    var selector=document.getElementById("enlacesGroup");
    var boton=document.getElementById("guardarEnlace");
    var nombre;
    var enlace;

    console.log("Hola Mundo");

    boton.addEventListener("click",function(){
        nombre = document.UpdtempresaRedes.nombreEnlace.value;
        enlace=document.UpdtempresaRedes.enlaceEmp.value;
        if(nombre!="" && enlace!=""){
            formEnlaces=document.UpdtempresaRedes.enlacesGroup;
            AñadirEnlace(formEnlaces,nombre,enlace);
        }
        else{
            alert("Debe ingresar un número.");
        }
    },false);

}

function AñadirEnlace(optionMenu, value,link){
    var texto="";
    var enlace="";
    var texto=value;
    enlace=link;
    var posicion = optionMenu.length;
    optionMenu[posicion] = new Option(texto,enlace);
    document.UpdtempresaRedes.nombreEnlace.value="";
    document.UpdtempresaRedes.enlaceEmp.value="";
}