/**
 * Created by LuisAlberto on 5/4/2015.
 */
function getExam(){
    var dia=document.getElementById("dia").value;
    var hora=document.getElementById("hora").value;
    var datos = encodeURIComponent("hora="+hora+"&dia="+dia);
    var url = "getFinalExam.php?"+datos;
    req = new XMLHttpRequest();
    req.onload = desplegarSigno;
    req.open("GET", url, true);
    req.send(null);
}
function desplegarSigno() {

    panel = document.getElementById("lblExamen");
    panel.value= req.responseText;
}