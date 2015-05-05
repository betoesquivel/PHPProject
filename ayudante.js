/**
 * Created by LuisAlberto on 5/4/2015.
 */
function getExam(){
    var opD = document.getElementById("dia");
    var dia= opD.options[opD.selectedIndex].value;
    var opH = document.getElementById("hora");
    var hora= opH.options[opH.selectedIndex].value;
    var datos = "hora="+hora+"&dia="+dia;
    var url = "getFinalExam.php?"+datos;
    req = new XMLHttpRequest();
    req.onload = desplegarSigno;
    req.open("GET", url, true);
    req.send(null);
}
function desplegarSigno() {

    panel = document.getElementById("lblExamen");
    panel.innerHTML= req.responseText;
}