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
    link = $("#link");
    panel.text (req.responseText);
    vm.examDate(req.responseText);
    if (req.responseText === "No hay examen esa fecha"){
        panel.removeClass("success");
        panel.addClass("alert");
        vm.visibleExam(false);
    }else{
        panel.addClass("success");
        panel.removeClass("alert");
        vm.visibleExam(true);
    }

    if ( !panel.is(":visible") ){
       panel.toggle();
    }

}

function Exam(className, examDate) {
    var self = this;
    self.className = ko.observable(className);
    self.examDate = ko.observable(examDate);
}
function ExamsViewModel(){
   var self = this;
    self.exams = ko.observableArray([]);
    self.addExam = function(){
        console.log("Adding");
        self.exams.push(new Exam(self.className(), self.examDate()));
        self.className("");
        self.visibleExam(false);
    };
    self.selectedTime = ko.observable();
    self.selectedDays = ko.observable();
    self.examDate = ko.observable();
    self.className = ko.observable();
    self.visibleExam = ko.observable(false);
}

vm = new ExamsViewModel();
ko.applyBindings(vm);