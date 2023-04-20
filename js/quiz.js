var titreQuiz;
var score = 0;
var questionIndex = 0;
var tabQuestionReponse;
var txtQuestion;
var btnReponse;
var reponseCorrect;

$(document).ready(function() {
    titreQuiz = $("#titreQuiz");
    txtQuestion = $("#txtQuestion");
    btnReponse = $('.btn-reponse');

    preStartQuiz();
});

preStartQuiz = () => {
    var idQuiz = $("#idQuiz");
    var idQuizVal = idQuiz.text();
    // Le tableau que retourne cette fonction
    var tab = [];
    // Le score de ce quiz de l'utilisateur
    var score = 0;


    //Transmettre l'idQuiz par la méthode $_GET dans l'api
    const url ="./api/playQuiz.php?idQuiz=" + encodeURIComponent(idQuizVal);
    // Envoie de l'URL 
    fetch(url)

    //On récupère la réponse du JSON (ce que l'API renvoie)
    .then(response => response.json())
    .then(data => {
        console.log(data);

        // Une copie du tableau pour pouvoir le manipuler à notre guise
        var questions = [...data];
        newQuestion(questions);
        addEcouteurBtn(questions)

    })
    .catch(error => {console.error(error)});
}

newQuestion = (questions) => {
        // Si il n'y a plus de question on va à la page de fin    
        if(questionIndex >= questions.length){
            window.location.href = "index.php?controleur=controleurQuiz&action=afficheFinQuiz";
        }

        // La question actuelle 
        var question = questions[questionIndex];
        console.log(question['reponseCorrect'])
        // La bonne réponse 
        var reponseCorrect = question['reponseCorrect'];

        // On change le champ de texte par la question
        txtQuestion.text(question.textQuestion);

        // Pour parcourir les btn
        var index = 0;
        // On change le champ de texte des réponses
        btnReponse.each(function() {
            $(this).text(question["reponse"+index]);
            // Si l'index est le même que la reponseCorrect dans data alors on lui ajoute un data-id pour l'a reconnaître lors du clic
            if(index === reponseCorrect){
                $(this).attr('data-id', '1');
            }
            index++;
        });
        // Pour passer à la question suivante
        questionIndex++;
}

//Ajout des écouteurs sur les boutons
addEcouteurBtn = (questions) => {
    $('.btn-reponse').on('click', function() {
        var classAdd;
        var dataId = $(this).data('id');

        if(dataId === 1){
            score++;
            classAdd = 'correct';
            $(this).addClass(classAdd);
        }else{
            classAdd = 'incorrect';
            $(this).addClass(classAdd);
        }

        setTimeout(() => {
            $(this).removeClass(classAdd);
            newQuestion(questions);
        }, 1000)
    }); 
}    