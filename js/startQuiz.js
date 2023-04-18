$("#startBtnStartQuiz").click(()=>{
    window.location.href = "index.php?controleur=controleurQuiz&action=afficheQuiz";
});

$("#exitBtnStartQuiz").click(()=>{
    window.location.href = "index.php?controleur=controleurMain";
});