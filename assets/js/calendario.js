var today = new Date();
var nummeses=3;
today.setDate(today.getDate()+nummeses*30)
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
var calendario=document.getElementById("FechaReserva");
calendario.setAttribute("min", today);

calendario.addEventListener("change",function(){
    if (calendario.value<today) {
        calendario.value=today;
    }
})
