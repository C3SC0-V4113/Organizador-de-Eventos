var selector=document.getElementById("Pantalla");
var escondido=document.getElementById("TotalEscondido");
var text=document.getElementById("totalNo");

selector.addEventListener("change",function(){
    text.innerText="Total de: $0";
    SeleccionarValores(selector)
});

function SeleccionarValores(select){
    var resultados=[];
    var opciones=select.options;
    //console.log(opciones)
    for (let index = 0; index < opciones.length; index++) {
        if (opciones[index].selected) {
            resultados.push(opciones[index].value);
        }
    }
    var suma=0;
    resultados.forEach(element => {
        suma+=parseInt(element);
    });
    text.innerText="Total de: $"+suma;
    escondido.value=suma;
    //console.log(suma);
}