$("#startBtnStartQuiz").click(()=>{
    window.location.href = "index.php?controleur=controleurQuiz&action=afficheQuiz";
});

$("#exitBtnStartQuiz").click(()=>{
    window.location.href = "index.php?controleur=controleurMain";
});

/*
//Afficher le profil des autres joueurs
$(".profilJoueur").click(()=>{
    window.location.href = "index.php?controleur=controleurQuiz&action=afficheQuiz";
})
*/