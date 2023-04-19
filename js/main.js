$(".name-btn").click(() => {
    $(".menu-p").toggle()
})

var bandoDiv = document.querySelector(".bando")
var listeReportBtn = document.createElement("BUTTON");
var t = document.createTextNode("🚨");
listeReportBtn.appendChild(t);
listeReportBtn.addEventListener('click',function(){
    window.location.href = 'http://localhost/index.php?controleur=controleurAdminListeReport&action=lireSignalements'
})

//if(/* Mon ID == 1*/) {
    bandoDiv.appendChild(listeReportBtn);
//}
