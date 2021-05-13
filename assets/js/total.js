var selector=document.getElementById("Pantalla");
var escondido=document.getElementById("TotalEscondido");
var text=document.getElementById("totalNo");
var Tipo=document.getElementById("TipoR");
var lugar=document.getElementById("LugarR");
var identificadores=document.getElementById("ArrayIDs");
var LugTipo=document.getElementById("LugarTipo");
text.innerText="Total de: $0";

if (LugTipo.value!="") {
    var LugSTipS=LugTipo.value.split("--");
    var IdLug=LugSTipS[0];
    var IdTip=LugSTipS[1];
    SelectorTipo(Tipo,IdTip);
    SelectorTipo(lugar,IdLug);
}
else{
    console.log("Adios mundo")
}

if (identificadores.value!="") {
    var IDS=identificadores.value.split(",");
    SeleccionarLoSelect(selector,IDS);
}
else{
    console.log("Hola mundo")
}

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

function SeleccionarLoSelect(select,idss){
    var resultados=[];
    var Ids=[];
    var opciones=select.options;
    //console.log(opciones)
    for (let index = 0; index < opciones.length; index++) {
            var valor=opciones[index].value;
            var Valores=valor.split('--');
            resultados.push(Valores[0]);
            Ids.push(Valores[1]);
    }

    for (let i = 0; i < idss.length; i++) {
        for (let j = 0; j < Ids.length; j++) {
            if (idss[i]==Ids[j]) {
                opciones[j].selected=true;
            }
        }
        
    }

    SeleccionarValores(selector);
}

function SelectorTipo(combo,$id){
    opciones=combo.options;
    for (let i = 0; i < opciones.length; i++) {
        if (opciones[i].value==$id) {
            opciones[i].selected=true;
        }
    }
}