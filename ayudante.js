/**
 * Created by LuisAlberto on 5/4/2015.
 */
$("#lblExamen").hide();
function getExam(){
    var opD = document.getElementById("dia");
    var dia= opD.options[opD.selectedIndex].value.trim();
    var opH = document.getElementById("hora");
    var hora= opH.options[opH.selectedIndex].value.trim();
    var datos = ("hora="+hora+"&dia="+dia).replace("+","%2B");

    var url = "getFinalExam.php?"+datos;
    req = new XMLHttpRequest();
    req.onload = desplegarSigno;
    req.open("GET", url, true);
    req.send(null);
}
function desplegarSigno() {

    panel = $("#lblExamen");
    panel.innerText= req.responseText;
    if ( !panel.is(":visible") ){
       panel.toggle();
    }

}