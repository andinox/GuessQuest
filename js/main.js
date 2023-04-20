
var bandoDiv = document.querySelector(".bando")
$(".name-btn").click(() => {
    $(".menu-p").toggle()
})

document.addEventListener('DOMContentLoaded', function() {
    var bandoDiv = document.querySelector(".bando")
var listeReportBtn = document.createElement("BUTTON");
var t = document.createTextNode("🚨");

listeReportBtn.appendChild(t);
listeReportBtn.addEventListener('click',function(){
    window.location.href = 'http://localhost/index.php?controleur=controleurAdminListeReport&action=lireSignalements'
})

// Ajouter la classe "report-btn" au bouton
listeReportBtn.classList.add("report-btn");

// Ajouter le bouton à la div "bando"
// If(monId == 1) / If(je suis admin)
bandoDiv.appendChild(listeReportBtn);

