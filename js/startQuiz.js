$("#startBtnStartQuiz").click(()=>{
    window.location.href = "index.php?controleur=controleurQuiz&action=afficheQuiz";
});

$.ajax({
    url: "./model/quiz.php",
    dataType: "json",
    success: function(data) {
        var img = data.image;
        var url = URL.createObjectURL(img);
        $('#fondQuiz').css('background-image', 'url(' + url + ')');
    }
});