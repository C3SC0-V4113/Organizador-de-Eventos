var selector=document.getElementById("Pantalla");
var escondido=document.getElementById("TotalEscondido");
var text=document.getElementById("totalNo");
var identificadores=document.getElementById("ArrayIDs");
text.innerText="Total de: $0";

selector.addEventListener("change",function(){
    SeleccionarValores(selector)
});

function SeleccionarValores(select){
    var resultados=[];
    var Ids=[];
    var opciones=select.options;
    //console.log(opciones)
    for (let index = 0; index < opciones.length; index++) {
        if (opciones[index].selected) {
            var valor=opciones[index].value;
            var Valores=valor.split('--');
            resultados.push(Valores[0]);
            Ids.push(Valores[1]);
        }
    }
    var suma=0;
    resultados.forEach(element => {
        suma+=parseInt(element);
    });
    text.innerText="Total de: $"+suma;
    escondido.value=suma;
    identificadores.value=Ids.join();
    //console.log(suma);
}