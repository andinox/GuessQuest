var titreQuiz;
var idQuiz;
var pseudo;
var idQuizVal;
var score = 0;
var questionIndex = 0;
var tabQuestionReponse;
var txtQuestion;
var btnReponse;
var reponseCorrect;
var progressBar;



$(document).ready(function() {
    titreQuiz = $("#titreQuiz");
    txtQuestion = $("#txtQuestion");
    progressBar = $("#progressBar");
    progressBar.attr('data-progress', 0+"%")
    preStartQuiz();
});




preStartQuiz = () => {
    idQuiz = $("#idQuiz");
    pseudo = $("#pseudoQuiz");
    idQuizVal = idQuiz.text();

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

    })
    .catch(error => {console.error(error)});
}




newQuestion = (questions) => {

    // La question actuelle 
    var question = questions[questionIndex];

    // On change le champ de texte par la question
    txtQuestion.text(question.textQuestion);
    
    // On met à zéro tous les attributs "data-id" de tous les boutons
    addBtnReponse(question);

    // Changement des champs de texte des boutons réponses
    changeTxtBtn(question);

    // On ajoute les écouteurs d'évènements
    addEcouteurBtn(questions);
    
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
            // Si il n'y a plus de question on va à la page de fin de quiz et MAJ du score de l'utilisateur
            if(questionIndex >= questions.length){
                //Transmettre le score par la méthode $_GET dans l'api
                const url ="./api/updateScore.php?scoreQuiz="+encodeURIComponent(score)+"&idQuiz="+encodeURIComponent(idQuiz)+"&pseudo="+encodeURIComponent(pseudo);
                // Envoie de l'URL 
                fetch(url)

                window.location.href = "index.php?controleur=controleurQuiz&action=afficheEndQuiz";

            }else {
                // On augment la progress bar 
                let pourcentage = (questionIndex/questions.length)*100;
                pourcentageArrondi = Math.round(pourcentage);
                progressBar.attr('data-progess', pourcentageArrondi+"%");

                //Suppression des button pour les re-construire dans la question suivante
                $("#sectionReponseQuiz .btn-reponse").remove();
                //Lancer la nouvelle question
                newQuestion(questions);
            }
        }, 1000)
    }); 
}




changeTxtBtn = (question) => {
    // L'index de la bonne réponse 
    let reponseCorrect = question['reponseCorrect'];
    let index = 0;

    // On change le champ de texte des réponses
    $('.btn-reponse').each(function() {
        $(this).text(question["reponse"+index]);
        // Si l'index est le même que la reponseCorrect dans data alors on lui ajoute un data-id pour l'a reconnaître lors du clic
        if(index == reponseCorrect){
            // On associe 1 à l'attribut data-id du button pour le remarquer des autres
            $(this).attr('data-id', '1');
        }else {
            $(this).attr('data-id', '0');
        }
        index++;
    });
}





addBtnReponse = (question) => {
    // Récupérer les clés du tableau question
    let keys = Object.keys(question);

    // Parcourir les clés et vérifier si elles correspondent au format "reponse+index"
    keys.forEach(key => {
        // Si les clés commence par reponse et suivi d'un ou plusieurs nombres
        if (key.match(/^reponse\d+$/)) {
            $("#sectionReponseQuiz").append("<button class='btn-reponse'></button>");
        }
    });
}


